<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Coupon;
use App\Models\Faq;
use App\Models\Order;
use App\Models\Pet;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $totalUser = User::count();
        $pendingOrders = Order::where('status', 0)->count();
        $completedOrders = Order::where('status', 1)->count();
        return view('admin_side.home')
            ->with('totalUser', $totalUser)
            ->with('completedOrders', $completedOrders)
            ->with('pendingOrders', $pendingOrders);
    }
    public function login()
    {
        return view('admin_side.auth.login');
    }
    public function submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/admin/dashboard');
        } else {
            // Authentication failed...
            return redirect()->back()
                ->withInput($request->only('email'))
                ->withErrors(['password' => 'Invalid credentials, please try again.']);
        }
    }
    public function pending()
    {
        $pendingOrder = Order::where('status', 0)->paginate(15);
        return view('admin_side.pendingorder')->with('pendingOrder', $pendingOrder);
    }
    public function canceled()
    {
        $canceledOrder = Order::where('status', 0)->where('_status', 'pending')->paginate(15);
        return view('admin_side.canceledorder')->with('canceledOrder', $canceledOrder);
    }
    public function completed()
    {
        $completedOrder = Order::where('status', 1)->paginate(12);
        return view('admin_side.completedorder')->with('completedOrder', $completedOrder);
    }
    public function delete($id)
    {

        $order = Order::find($id);

        if (!$order) {
            return redirect()->route('home')->with('error', 'Order not found.');
        }
        $order->delete();

        // Redirect with a success message
        return redirect()->back()->with('success', 'Order deleted successfully.');
    }
    public function canceleddelete($id)
    {

        $order = Order::find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }
        $order->delete();

        // Redirect with a success message
        return redirect()->back()->with('success', 'Order deleted successfully.');
    }

    public function profile()
    {
        return view('admin_side.profile');
    }
    public function profileupdate(Request $request)
    {

        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required|email|exists:admins,email',
            'password' => 'nullable',
            'confirmpassword' => 'nullable|same:password',
        ],
            [
                'name.required' => 'The name field is required.',
                'email.required' => 'The email field is required.',
                'email.email' => 'Please enter a valid email address.',
                'email.exists' => 'The email does not exist in our records.',
                'password.min' => 'The password must be at least 6 characters long.',
                'confirmpassword.same' => 'The confirm password must match the password.',
            ]);

        $admin = Admin::find($request->id);

        $admin->name = $validation['name'];
        $admin->email = $validation['email'];

        // Check if a new password is provided
        if (!empty($validation['password'])) {
            $admin->password = Hash::make($validation['password']);

        }
        $admin->save();
        return redirect()->back()->with('success', "Your Profile Updated Successfully..!!");

    }
    public function updateorder(Request $request)
    {

        $order_id = $request->orderid;
        $orderdata = Order::find($order_id);

        $orderdata->update([
            'status' => $request->status,
            'courier_no' => $request->courierId,
            'courier_company_name' => $request->companyname,
            'courier_link' => $request->companylink,
        ]);
        return redirect()->back()->with('success', 'Status update successfully.');
    }
//banner
    public function indexBanner()
    {
        return view('admin_side.banner');
    }
    public function storeBanner(Request $request)
    {

        $validation = $request->validate([
            'bannertitle' => 'required',
            'bannerdiscount' => 'required',
            'promoCode' => 'required',
            'bannerdescription' => 'required',
            'bannerimage' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'bannertitle.required' => 'The banner title is required.',
            'bannerdiscount.required' => 'The banner discount is required.',
            'promoCode.required' => 'The promo code is required.',
            'bannerdescription.required' => 'The banner description is required.',
            'bannerimage.required' => 'The banner image is required.',
            'bannerimage.image' => 'The selected file must be an image.',
            'bannerimage.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'bannerimage.max' => 'The image may not be greater than 2048 kilobytes.',
        ]);

        $imagePath = null;

        if ($request->hasFile('bannerimage')) {
            $image = $request->file('bannerimage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $imagePath = $image->storeAs('banner_images', $imageName, 'public');
        }

        $banner = new Banner;
        $banner->title = $request->bannertitle;
        $banner->description = $request->bannerdescription;
        $banner->image = $imageName;
        $banner->promo_code = $request->promoCode;
        $banner->discount = $request->bannerdiscount;
        $banner->save();

        return redirect()->route('admin.banner.index')->with('success', 'Banner created successfully!');

    }
    public function showBanner()
    {
        $banner = Banner::orderBy('title', 'asc')->get();
        return view('admin_side.bannerView')
            ->with('banner', $banner);
    }

    public function delBanner($id)
    {
        $banner = Banner::find($id);

        if (!$banner) {

            return redirect()->route('admin.banner.show')
                ->with('error', 'Banner not found');

        }
        $imagePath = public_path('storage/banner_images/' . $banner->image);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $banner->delete();

        return redirect()->route('admin.banner.show')->with('success', 'Banner deleted successfully');

    }
    public function editBanner(Request $request, $id)
    {

        $banner = Banner::find($id);

        if (!$banner) {
            return redirect()->back()->with('error', 'Banner not found.');
        }

        // Check if a new image file is uploaded
        if ($request->hasFile('bannerimage')) {
            $image = $request->file('bannerimage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Store the new image in the 'banner_images' directory within the 'public' disk
            $imagePath = $image->storeAs('banner_images', $imageName, 'public');

            // Delete the old image file (if it exists)
            if (Storage::disk('public')->exists('banner_images/' . $banner->image)) {
                Storage::disk('public')->delete('banner_images/' . $banner->image);
            }

            // Update the banner with the new image path
            $banner->image = $imageName;
        }

        // Update other category properties
        $banner->title = $request->bannertitle;
        $banner->description = $request->bannerdescription;
        $banner->promo_code = $request->promoCode;
        $banner->discount = $request->bannerdiscount;
        $banner->save();

        // Redirect back with success message

        return redirect()->back()->with('success', 'Banner updated successfully.');

    }
    //category
    public function indexCategory()
    {
        return view('admin_side.category');
    }
    public function storeCategory(Request $request)
    {

        $validation = $request->validate([
            'categoryname' => 'required',
            'categoryimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'categoryname.required' => 'Please enter a category name.',
            'categoryimage.required' => 'Please upload an image for the category.',
            'categoryimage.image' => 'The selected file must be an image.',
            'categoryimage.mimes' => 'The image must be in one of the following formats: jpeg, png, jpg, gif, svg.',
            'categoryimage.max' => 'The image size must not exceed 2048 kilobytes (2MB).',
        ]);

        $imagePath = null;

        if ($request->hasFile('categoryimage')) {
            $image = $request->file('categoryimage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $imagePath = $image->storeAs('category_images', $imageName, 'public');
        }

        $category = new Category;
        $category->name = $request->categoryname;
        $category->image = $imageName;
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Category created successfully!');

    }
    public function showCategory()
    {
        $category = Category::orderBy('name', 'asc')->get();
        return view('admin_side.categoryView')
            ->with('category', $category);
    }
    public function delCategory($id)
    {
        $category = Category::find($id);

        if (!$category) {

            return redirect()->route('admin.category.show')
                ->with('error', 'Category not found');

        }
        $imagePath = public_path('storage/category_images/' . $category->image);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $category->delete();

        return redirect()->route('admin.category.show')->with('success', 'Category deleted successfully');

    }
    public function editCategory(Request $request, $id)
    {

        $category = Category::find($id);

        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }

        // Check if a new image file is uploaded
        if ($request->hasFile('categoryimage')) {
            $image = $request->file('categoryimage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Store the new image in the 'category_images' directory within the 'public' disk
            $imagePath = $image->storeAs('category_images', $imageName, 'public');

            // Delete the old image file (if it exists)
            if (Storage::disk('public')->exists('category_images/' . $category->image)) {
                Storage::disk('public')->delete('category_images/' . $category->image);
            }

            // Update the category with the new image path
            $category->image = $imageName;
        }

        // Update other category properties
        $category->name = $request->categoryname;

        $category->save();

        // Redirect back with success message

        return redirect()->back()->with('success', 'Category updated successfully.');

    }
    //color
    public function indexColor()
    {
        return view('admin_side.color');
    }
    public function storeColor(Request $request)
    {

        $validation = $request->validate([
            'colorname' => 'required',

        ], [
            'colorname.required' => 'Please enter a color name.',

        ]);

        $color = new Color;
        $color->name = $request->colorname;

        $color->save();

        return redirect()->route('admin.color.index')->with('success', 'Color created successfully!');

    }
    public function showColor()
    {
        $color = Color::orderBy('name', 'asc')->get();
        return view('admin_side.colorView')
            ->with('color', $color);
    }
    public function delColor($id)
    {
        $color = Color::find($id);

        if (!$color) {

            return redirect()->route('admin.color.show')
                ->with('error', 'Color not found');

        }

        $color->delete();

        return redirect()->route('admin.color.show')->with('success', 'Color deleted successfully');

    }
    public function editColor(Request $request, $id)
    {

        $color = Color::find($id);

        if (!$color) {
            return redirect()->back()->with('error', 'Color not found.');
        }

        // Check if a new image file is uploaded

        // Update other color properties
        $color->name = $request->colorname;

        $color->save();

        // Redirect back with success message

        return redirect()->back()->with('success', 'Color updated successfully.');

    }
    //coupon
    public function indexCoupon()
    {
        return view('admin_side.coupon');
    }
    public function storeCoupon(Request $request)
    {

        $validation = $request->validate([
            'code' => 'required',
            'discount' => 'required',
        ], [
            'code.required' => 'Please enter a code.', // Custom message for the code field
            'discount.required' => 'Please specify a discount.', // Custom message for the discount field

        ]);

        $coupon = new Coupon;
        $coupon->code = $request->code;
        $coupon->discount = $request->discount;

        $coupon->save();

        return redirect()->route('admin.coupon.index')->with('success', 'Coupon created successfully!');

    }
    public function showCoupon()
    {
        $coupon = Coupon::orderBy('code', 'asc')->get();
        return view('admin_side.couponView')
            ->with('coupon', $coupon);
    }
    public function delCoupon($id)
    {
        $coupon = Coupon::find($id);

        if (!$coupon) {

            return redirect()->route('admin.coupon.show')
                ->with('error', 'Coupon not found');

        }

        $coupon->delete();

        return redirect()->route('admin.coupon.show')->with('success', 'Coupon deleted successfully');

    }
    public function editCoupon(Request $request, $id)
    {

        $coupon = Coupon::find($id);

        if (!$coupon) {
            return redirect()->back()->with('error', 'Coupon not found.');
        }

        // Check if a new image file is uploaded

        // Update other coupon properties
        $coupon->code = $request->code;
        $coupon->discount = $request->discount;

        $coupon->save();

        // Redirect back with success message

        return redirect()->back()->with('success', 'Coupon updated successfully.');

    }
    //brand
    public function indexBrand()
    {
        return view('admin_side.brand');
    }
    public function storeBrand(Request $request)
    {

        $validation = $request->validate([
            'brandname' => 'required',
            'brandimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'brandname.required' => 'Please enter a brand name.',
            'brandimage.required' => 'Please upload an image for the brand.',
            'brandimage.image' => 'The selected file must be an image.',
            'brandimage.mimes' => 'The image must be in one of the following formats: jpeg, png, jpg, gif, svg.',
            'brandimage.max' => 'The image size must not exceed 2048 kilobytes (2MB).',
        ]);

        $imagePath = null;

        if ($request->hasFile('brandimage')) {
            $image = $request->file('brandimage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $imagePath = $image->storeAs('brand_images', $imageName, 'public');
        }

        $brand = new Brand;
        $brand->name = $request->brandname;
        $brand->image = $imageName;
        $brand->save();

        return redirect()->route('admin.brand.index')->with('success', 'Brand created successfully!');

    }
    public function showBrand()
    {
        $brand = Brand::orderBy('name', 'asc')->get();
        return view('admin_side.brandView')
            ->with('brand', $brand);
    }
    public function delBrand($id)
    {
        $brand = Brand::find($id);

        if (!$brand) {

            return redirect()->route('admin.brand.show')
                ->with('error', 'Brand not found');

        }
        $imagePath = public_path('storage/brand_images/' . $brand->image);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $brand->delete();

        return redirect()->route('admin.brand.show')->with('success', 'Brand deleted successfully');

    }
    public function editBrand(Request $request, $id)
    {

        $brand = Brand::find($id);

        if (!$brand) {
            return redirect()->back()->with('error', 'Brand not found.');
        }

        // Check if a new image file is uploaded
        if ($request->hasFile('brandimage')) {
            $image = $request->file('brandimage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Store the new image in the 'brand_images' directory within the 'public' disk
            $imagePath = $image->storeAs('brand_images', $imageName, 'public');

            // Delete the old image file (if it exists)
            if (Storage::disk('public')->exists('brand_images/' . $brand->image)) {
                Storage::disk('public')->delete('brand_images/' . $brand->image);
            }

            // Update the brand with the new image path
            $brand->image = $imageName;
        }

        // Update other brand properties
        $brand->name = $request->brandname;

        $brand->save();

        // Redirect back with success message

        return redirect()->back()->with('success', 'Brand updated successfully.');

    }
    //pet
    public function indexPet()
    {
        return view('admin_side.pet');
    }
    public function storePet(Request $request)
    {

        $validation = $request->validate([
            'petname' => 'required',
            'petimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'petname.required' => 'Please enter a pet name.',
            'petimage.required' => 'Please upload an image for the pet.',
            'petimage.image' => 'The selected file must be an image.',
            'petimage.mimes' => 'The image must be in one of the following formats: jpeg, png, jpg, gif, svg.',
            'petimage.max' => 'The image size must not exceed 2048 kilobytes (2MB).',
        ]);

        $imagePath = null;

        if ($request->hasFile('petimage')) {
            $image = $request->file('petimage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $imagePath = $image->storeAs('pet_images', $imageName, 'public');
        }

        $pet = new Pet;
        $pet->name = $request->petname;
        $pet->image = $imageName;
        $pet->save();

        return redirect()->route('admin.pet.index')->with('success', 'Pet created successfully!');

    }
    public function showPet()
    {
        $pet = Pet::orderBy('name', 'asc')->get();
        return view('admin_side.petView')
            ->with('pet', $pet);
    }
    public function delPet($id)
    {
        $pet = Pet::find($id);

        if (!$pet) {

            return redirect()->route('admin.pet.show')
                ->with('error', 'Pet not found');

        }
        $imagePath = public_path('storage/pet_images/' . $pet->image);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $pet->delete();

        return redirect()->route('admin.pet.show')->with('success', 'Pet deleted successfully');

    }
    public function editPet(Request $request, $id)
    {

        $pet = Pet::find($id);

        if (!$pet) {
            return redirect()->back()->with('error', 'Pet not found.');
        }

        // Check if a new image file is uploaded
        if ($request->hasFile('petimage')) {
            $image = $request->file('petimage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Store the new image in the 'pet_images' directory within the 'public' disk
            $imagePath = $image->storeAs('pet_images', $imageName, 'public');

            // Delete the old image file (if it exists)
            if (Storage::disk('public')->exists('pet_images/' . $pet->image)) {
                Storage::disk('public')->delete('pet_images/' . $pet->image);
            }

            // Update the pet with the new image path
            $pet->image = $imageName;
        }

        // Update other pet properties
        $pet->name = $request->petname;

        $pet->save();

        // Redirect back with success message

        return redirect()->back()->with('success', 'Pet updated successfully.');

    }
    //size
    public function indexSize()
    {
        return view('admin_side.size');
    }
    public function storeSize(Request $request)
    {

        $validation = $request->validate([
            'sizename' => 'required',

        ], [
            'sizename.required' => 'Please enter a size name.',

        ]);

        $size = new Size;
        $size->name = $request->sizename;

        $size->save();

        return redirect()->route('admin.size.index')->with('success', 'Size created successfully!');

    }
    public function showSize()
    {
        $size = Size::orderBy('name', 'asc')->get();
        return view('admin_side.sizeView')
            ->with('size', $size);
    }
    public function delSize($id)
    {
        $size = Size::find($id);

        if (!$size) {

            return redirect()->route('admin.size.show')
                ->with('error', 'Size not found');

        }

        $size->delete();

        return redirect()->route('admin.size.show')->with('success', 'Size deleted successfully');

    }
    public function editSize(Request $request, $id)
    {

        $size = Size::find($id);

        if (!$size) {
            return redirect()->back()->with('error', 'Size not found.');
        }

        // Check if a new image file is uploaded

        // Update other size properties
        $size->name = $request->sizename;

        $size->save();

        // Redirect back with success message

        return redirect()->back()->with('success', 'Size updated successfully.');

    }
    //faqs
    public function indexFaq()
    {
        return view('admin_side.faq');
    }
    public function storeFaq(Request $request)
    {

        $validation = $request->validate([
            'faqname' => 'required', // Assuming 'faqname' is a string with a maximum length of 255 characters
            'isopen' => 'required|in:1,0', // Validates that 'isopen' must be either 'open' or 'closed'
            'faqdescription' => 'required|string', // Assuming 'faqdescription' is a string without a maximum length specified
        ], [
            'faqname.required' => 'Please enter a FAQ title.', // Custom error message for 'faqname'
            'isopen.required' => 'Please select an option for "Is Open".', // Custom error message for 'isopen'
            'isopen.in' => 'The selected option for "Is Open" is invalid.', // Additional validation to ensure the value is either 'open' or 'closed'
            'faqdescription.required' => 'Please enter a FAQ description.', // Custom error message for 'faqdescription'
        ]);

        $faq = new Faq;
        $faq->title = $request->faqname;
        $faq->is_open = $request->isopen;
        $faq->description = $request->faqdescription;

        $faq->save();

        return redirect()->route('admin.faq.index')->with('success', 'Faq created successfully!');

    }
    public function showFaq()
    {
        $faq = Faq::orderBy('title', 'asc')->get();
        return view('admin_side.faqView')
            ->with('faq', $faq);
    }
    public function statusUpdateFaq(Request $request)
    {
        $faq = FAQ::find($request->id);
        if ($faq) {
            $faq->is_open = $request->isOpen;
            $faq->save();
            return response()->json(['success' => 'FAQ status updated successfully']);
        }

        return response()->json(['error' => 'FAQ not found']);
    }
    public function delFaq($id)
    {
        $faq = Faq::find($id);

        if (!$faq) {

            return redirect()->route('admin.faq.show')
                ->with('error', 'Faq not found');

        }

        $faq->delete();

        return redirect()->route('admin.faq.show')->with('success', 'Faq deleted successfully');

    }
    public function editFaq(Request $request, $id)
    {

        $faq = Faq::find($id);

        if (!$faq) {
            return redirect()->back()->with('error', 'Faq not found.');
        }

        // Check if a new image file is uploaded

        $faq->title = $request->faqname;
        $faq->description = $request->faqdescription;
        $faq->save();
        // Redirect back with success message

        return redirect()->back()->with('success', 'Faq updated successfully.');

    }
    //product
    public function indexProduct()
    {
        $pets = Pet::all();
        $categories = Category::all();
        return view('admin_side.product')
            ->with('categories', $categories)
            ->with('pets', $pets);
    }
    public function storeProduct(Request $request)
    {

        $validation = $request->validate([
            'productname' => 'required',
            'productdiscount' => 'required',
            'productquantity' => 'required',
            'productdescription' => 'required',
            'sale' => 'required',
            'purchase' => 'required',
            'pet' => 'required',
            'feature' => 'required',
            'category' => 'required',
            'productimage' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'productname.required' => 'The product name field is required.',
            'productdiscount.required' => 'The product discount field is required.',
            'productquantity.required' => 'The product quantity field is required.',
            'productdescription.required' => 'The product description field is required.',
            'sale.required' => 'The sale field is required.',
            'purchase.required' => 'The purchase field is required.',
            'pet.required' => 'Please select a pet for the product.',
            'feature.required' => 'The feature field is required.',
            'category.required' => 'Please select a category for the product.',
            'productimage.required' => 'Please upload a product image.',
            'productimage.mimes' => 'The product image must be a valid image file (jpeg, png, jpg, gif, svg).',
            'productimage.max' => 'The product image must not exceed 2048 kilobytes.',
        ]);

        $imagePath = null;

        if ($request->hasFile('productimage')) {
            $image = $request->file('productimage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $imagePath = $image->storeAs('product_images', $imageName, 'public');
        }

        $product = new Product;
        $product->name = $request->productname;
        $product->description = $request->productdescription;
        $product->photo = $imageName;
        $product->quantity = $request->productquantity;
        $product->discount = $request->productdiscount;
        $product->sale = $request->sale;
        $product->brand_id = 0;
        $product->purchase = $request->purchase;
        $product->feature = $request->feature;
        $product->pet_id = $request->pet;
        $product->category_id = $request->category;
        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Product created successfully!');

    }
    public function showProduct()
    {
        $product = Product::orderBy('name', 'asc')->get();
        $pets = Pet::all();
        $categories = Category::all();
        return view('admin_side.productView')
            ->with('product', $product)
            ->with('categories', $categories)
            ->with('pets', $pets);

    }

    public function delProduct($id)
    {
        $product = Product::find($id);

        if (!$product) {

            return redirect()->route('admin.product.show')
                ->with('error', 'Product not found');

        }
        $imagePath = public_path('storage/product_images/' . $product->photo);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $product->delete();

        return redirect()->route('admin.product.show')->with('success', 'Product deleted successfully');

    }
    public function editProduct(Request $request, $id)
    {

        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        // Check if a new image file is uploaded
        if ($request->hasFile('productimage')) {
            $image = $request->file('productimage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Store the new image in the 'product_images' directory within the 'public' disk
            $imagePath = $image->storeAs('product_images', $imageName, 'public');

            // Delete the old image file (if it exists)
            if (Storage::disk('public')->exists('product_images/' . $product->photo)) {
                Storage::disk('public')->delete('product_images/' . $product->photo);
            }

            // Update the product with the new image path
            $product->photo = $imageName;
        }

        // Update other category properties
        $product->name = $request->productname;
        $product->description = $request->productdescription;
        $product->quantity = $request->productquantity;
        $product->discount = $request->productdiscount;
        $product->sale = $request->sale;
        $product->brand_id = 0;
        $product->purchase = $request->purchase;
        $product->pet_id = $request->pet;
        $product->category_id = $request->category;
        $product->save();

        // Redirect back with success message

        return redirect()->back()->with('success', 'Product updated successfully.');

    }
    public function featureUpdateProduct(Request $request)
    {

        $product = Product::find($request->id);
        if ($product) {
            $product->feature = $request->feature;
            $product->save();
            return response()->json(['success' => 'Product Feature updated successfully']);
        }

        return response()->json(['error' => 'Product not found']);
    }

}
