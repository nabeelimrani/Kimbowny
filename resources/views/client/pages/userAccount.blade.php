@extends("layouts.app")
@section("content")

  <style>
    /* CSS */
    .copyable-link-container {
      display: flex;
      align-items: center;
    }

    .copyable-link-input {
      flex: 1;
      margin-right: 8px; /* Adjust margin as needed */
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
    }

    .copy-link-button {
      padding: 4px 9px;
      background-color: #f89f44;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }



  </style>
         <!-- Bradcrumb -->
         <section class="bradcrumb-area page-background">
            <div class="container">
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                     <div class="bradcrumb-box text-center">
                        <h1>User Account</h1>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- Bradcrumb -->
         <!-- Page Content -->
         <section class="page-content-area page-paddings">
            <div class="container">
               <div class="row">

                       <div class="col-lg-3 col-md-3 col-sm-12" >
                       <div class="nav d-lg-block d-md-block d-none nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                         <button class="theme-btn btn-light w-100 mb-2 " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</button>
                         <button class="theme-btn btn-light w-100 mb-2" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Orders Details</button>
                         <button class="theme-btn btn-light w-100 mb-2" id="v-pills-account-tab" data-toggle="pill" href="#v-pills-account" role="tab" aria-controls="v-pills-account" aria-selected="false">Account Details</button>
                         <button class="theme-btn btn-light w-100 mb-2" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Referrals</button>
                         <button class="theme-btn btn-light w-100 mb-2" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Security</button>
                       </div>
                         <div class="nav d-flex d-lg-none d-md-none nav-pills border-bottom mb-3" id="v-pills-tab" role="tablist" >
                           <button class="theme-btn btn-light mx-1 mb-2 " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</button>
                           <button class="theme-btn btn-light mx-1 mb-2" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Orders Details</button>
                           <button class="theme-btn btn-light mx-1 mb-2" id="v-pills-account-tab" data-toggle="pill" href="#v-pills-account" role="tab" aria-controls="v-pills-account" aria-selected="false">Account Details</button>
                           <button class="theme-btn btn-light mx-1 mb-2" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Referrals</button>
                           <button class="theme-btn btn-light mx-1 mb-2" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Security</button>

                         </div>
                       </div>
                       <div class="col-lg-9 col-md-9 col-sm-12 border p-5" >

                       <div class="tab-content" id="v-pills-tabContent">
                         <div class="tab-pane fade show active " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                           <div class="container">
                             <div>
                             <h5>Welcome to Your Dashboard {{auth()->user()->fullname}}....</h5>
                               <span>Referred By {{auth()->user()->referredBy ? auth()->user()->referredBy->fullname:'No One'}}</span>
                             </div>
                             <hr>
                             <div class="row">
                             <div class="col-md-6">

                               <div class="d-flex justify-content-between">
                                 <h4>Referrals</h4>
                                 <img class="bg-light" width="60" src="{{asset('referals.png')}}" alt="">
                               </div>
                               <span class="my-2">Total Referrals ({{auth()->user()->referrals()->count()}}) </span>
                               <!-- Blade View -->
                               <div class="copyable-link-container my-3">
                                 <input type="text" class="copyable-link-input" value="{{ url('/register')."/".auth()->user()->referral_code }}" readonly>
                                 <button class="copy-link-button"><i class="fa fa-clipboard"></i></button>
                                 <!-- Blade View -->
                                 <script>
                                   document.addEventListener('DOMContentLoaded', function() {
                                     const copyLinkButtons = document.querySelectorAll('.copy-link-button');

                                     copyLinkButtons.forEach(button => {
                                       button.addEventListener('click', function() {
                                         const input = this.parentNode.querySelector('.copyable-link-input');

                                         input.select();
                                         document.execCommand('copy');


                                         button.innerHTML = 'Copied!';
                                         setTimeout(() => {
                                           button.innerHTML = '<i class="fa fa-clipboard"></i>';
                                         }, 1500);
                                       });
                                     });
                                   });
                                 </script>


                               </div>

                             </div>
                             <div class="col-md-6">
                               <div class="d-flex justify-content-between">
                                 <h4>Reward Earned</h4>
                                 <img class="bg-light" width="40" src="{{asset('reward.png')}}" alt="">
                               </div>
                               <span class="my-2">Total Earned AED : @php auth()->user()->referrals()->where("made_purchase",1)->count()*30 .".00"@endphp </span>
                             </div>
                           </div>
                           </div>
                         </div>
                         <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                           <div style="max-height: 300px; overflow-y: auto;">

                           <table class="table table-striped">
                             <thead><tr>
                               <th>#sno</th>
                               <th>Date</th>
                               <th>Payment Status</th>
                               <th>Fullfilment Status</th>
                               <th>#Tracking no</th>
                               <th>Company Link</th>
                               <th>Order Details</th>
                               <th>Total Amount</th>
                             </tr></thead>
                             <tbody>

                             </tbody>
                           </table>
                           </div>
                         </div>
                         <div class="tab-pane fade" id="v-pills-account" role="tabpanel" aria-labelledby="v-pills-account-tab">
                           <form id="updateAccount"  class="w-100">
                             @csrf
                             <div class="row">
                               <div class="col-md-6 mb-3">
                                 <label for="firstname">First Name</label>
                                 <input type="text" class="form-control " id="firstname" value="{{authfilter('firstname')}}" name="firstname" >
                                 <div id="error-firstname"></div>
                               </div>

                               <div class="col-md-6 mb-3 ">
                                 <label for="lastname">Last Name</label>
                                 <input type="text" class="form-control" id="lastname" value="{{authfilter('lastname')}}" name="lastname" >
                                 <div id="error-lastname"></div>
                               </div>
                               <div class="col-md-6 mb-3">
                                 <label for="address">Street/villa - Tower/flat</label>
                                 <input type="text" class="form-control" id="address"  value="{{authfilter('address')}}" name="address">
                                 <div id="error-address"></div>
                               </div>
                               <div class="col-md-6 mb-3">
                                 <label for="address">Area</label>
                                 <input type="text" class="form-control" id="area"  value="{{authfilter('area')}}" name="area" >
                                 <div id="error-area"></div>
                               </div>
                               <div class="col-md-6 mb-3">
                                 <label for="address">City</label>
                                 <input type="text" class="form-control" id="city"  value="{{authfilter('city')}}" name="city" >
                                 <div id="error-city"></div>
                               </div>
                               <div class="col-md-6 mb-3">
                                 <label for="address">Country</label>
                                 <select class="form-control custom-select" name="country" id="checkoutcountry">
                                   <option value="">Choose..</option>

                                     <option selected>{{ auth()->user()->country }}</option>
                                     <option {{ old('country') == 'United Arab Emirates' ? 'selected' : '' }}>United Arab Emirates
                                     </option>
                                     <option {{ old('country') == 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>


                                 </select>
                                 <div id="error-country"></div>
                               </div>
                               <div class="col-md-6 ">
                                 <button type="submit" class="btn custom-btn mt-3" >Update Password</button>
                               </div>
                             </div>
                           </form>

                         </div>
                         <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

                           <div class="row">
                             <div style="max-height: 300px; overflow-y: auto;">

                               <table class="table table-striped">
                                 <thead><tr>
                                   <th>#sno</th>
                                   <th>Referral Name</th>
                                   <th>Referral Purchased</th>
                                   <th>Reward Status</th>

                                 </tr>
                                 </thead>
                                 <tbody>
                                 @foreach($referrals as $index=>$refer)
                                   <tr>
                                     <td>{{$index+1}}</td>
                                     <td>{{$refer->fullname}}</td>
                                     <td>{{$refer->made_purchase?'Purchased':'Not Yet'}}</td>
                                     <td>{{$refer->reward_received?'Given':'Not Yet'}}</td>

                                   </tr>
                                 @endforeach
                                 </tbody>
                               </table>
                             </div>
                           </div>
                         </div>
                         <div class="tab-pane fade " id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                             <form id="updatePassword" class="w-100 ">
                           @csrf
                               <div class="row">
                             <div class="col-md-12 mb-3">
                               <label for="current-password">Current Password</label>
                               <input type="password" class="form-control w-50" id="current-password" value="{{old('current-password')}}" name="current-password" placehauthfilterer="Current Password">
                               <div id="error-current-password"></div>
                             </div>

                             <div class="col-md-6 ">
                               <label for="new-password">New Password</label>
                               <input type="password" class="form-control" id="new-password" value="{{old('new-password')}}" name="new-password" placehauthfilterer="New Password">
                               <div id="error-new-password"></div>
                             </div>
                             <div class="col-md-6 ">
                               <label for="confirm-password">Confirm Password</label>
                               <input type="password" class="form-control" id="confirm-password"  value="{{old('confirm-password')}}" name="confirm-password" placehauthfilterer="Confirm Password">
                               <div id="error-confirm-password"></div>
                             </div>
                             <div class="col-md-6 ">
                             <button type="submit" class="btn custom-btn mt-3" >Update Password</button>
                             </div>
                           </div>
                             </form>
                         </div>
                       </div>

                       </div>

            </div>
            </div>
         </section>

@endsection
