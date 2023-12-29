<div>
    <div class="py-3 md:py-4 checkout">
        <div class="container">
            <h4 class="font-semibold text-lg text-s">Checkout</h4>
            <hr>

            @if ($this->totalProductAmount != '0')
            <div class="row">
                <div class="md:col-span-12 mb-4">
                    <div class="shadow bg-s p-3">
                        <h4 class="text-primary">
                            Item Total Amount :
                            <span class="justify-end">Rm {{$this->totalProductAmount}}</span>
                        </h4>
                        <hr>
                        <small>* Items will be delivered in 3 - 5 days.</small>
                        <br/>
                        <small>* Tax and other charges are included ?</small>
                    </div>
                </div>


                <div class="md:col-span-12">
                    <div class="shadow bg-s p-3">
                        <h4 class="text-primary">
                            Basic Information
                        </h4>
                        <hr>


                       
                        <div class="row">
                            <div class="md:col-span-6 mb-3">
                                <label>Full Name</label>
                                <input type="text" wire:model="fullname" class="form-control rounded-none focus:border-1 focus:border-black focus:box-shadow-none" placeholder="Enter Full Name" />
                                <!--this was supposed to pop up when the user tries to go to payment without filling the forms-->
                                @error('fullname') <small class="text-red-700">{{$message}}</small> @enderror 
                            </div>
                            <div class="md:col-span-6 mb-3">
                                <label>Phone Number</label>
                                <input type="number" wire:model="phone" class="form-control rounded-none focus:border-1 focus:border-black focus:box-shadow-none" placeholder="Enter Phone Number" />
                                <!--this was supposed to pop up when the user tries to go to payment without filling the forms-->
                                @error('phone') <small class="text-red-700">{{$message}}</small> @enderror
                            </div>
                            <div class="md:col-span-6 mb-3">
                                <label>Email Address</label>
                                <input type="email" wire:model="email" class="form-control rounded-none focus:border-1 focus:border-black focus:box-shadow-none" placeholder="Enter Email Address" />
                                <!--this was supposed to pop up when the user tries to go to payment without filling the forms-->
                                @error('email') <small class="text-red-700">{{$message}}</small> @enderror
                            </div>
                            <div class="md:col-span-6 mb-3">
                                <label>Pin-code (Zip-code)</label>
                                <input type="number" wire:model="pincode" class="form-control rounded-none focus:border-1 focus:border-black focus:box-shadow-none" placeholder="Enter Pin-code" />
                                <!--this was supposed to pop up when the user tries to go to payment without filling the forms-->
                                @error('pincode') <small class="text-red-700">{{$message}}</small> @enderror
                            </div>
                            <div class="md:col-span-6 mb-3">
                                <label>Full Address</label>
                                <textarea wire:model="address" class="form-control rounded-none focus:border-1 focus:border-black focus:box-shadow-none" rows="2"></textarea>
                                <!--this was supposed to pop up when the user tries to go to payment without filling the forms-->
                                @error('address') <small class="text-red-700">{{$message}}</small> @enderror
                            </div>
                            <div class="md:col-span-6 mb-3">
                                <label>Select Payment Mode: </label>
                                    <div class="tab-content md:col-span-9 pr-3" id="v-pills-tabContent">
                                        <!--this was supposed to have hidden clickable buttons using-->
                                        <div class="tab-pane fade mb-2" id="cashOnDeliveryTab">
                                            <button type="button" wire:click="codOrder" class="w-100 bg-m hover:bg-s hover:text-m text-s font-bold py-2 px-4 rounded inline-block">Place Order (Cash on Delivery)</button>
                                        </div>
                                        <div class="tab-pane " id="onlinePayment">
                                            <button type="button" wire:click="codOrder" class="w-100 bg-m hover:bg-s hover:text-m text-s font-bold py-2 px-4 rounded inline-block">Pay Now (Online Payment)</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        

                    </div>
                </div>

            </div>
            @else
                <div class="text-semibold text-lg text-s text-center">
                    <h4>No items in cart for Checkout </h4>
                    <a href="{{url('/shop')}}" class="underline text-blue-500">Buy Items</a>

                </div>
            @endif

        </div>
    </div>
</div>
