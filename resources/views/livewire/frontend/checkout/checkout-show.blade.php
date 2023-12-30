<div>
    <div class="checkout">
        <div class="container">
            @if ($this->totalProductAmount != '0')
            <div class="row mt-4">
                <div class="max-w-5xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

                    <div class="shadow bg-s py-3 text-center rounded">
                        <h4 class="text-primary text-m text-lg">
                            <b>Item Total Amount :</b>
                            <b><span class="justify-end">Rm {{$this->totalProductAmount}}</span></b>
                        </h4>
                        <small>* Items will be delivered in 3 - 5 days.</small>
                        <br/>
                        <small>* Tax and other charges are included.</small>
                    </div>
                </div>


                <div class="max-w-5xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="shadow bg-s py-3 text-center text-m rounded">
                        <h4 class="text-primary pb-2 text-xl font-bold">
                            Basic Information
                        </h4>
                        <div class="row">
                            <div class="md:col-span-6 mb-3">
                                <label class="block">Full Name:</label>
                                <input type="text" wire:model.defer="fullname" class="form-control mt-1 bg-m focus:bg-s focus:text-m border-m rounded-md shadow-sm text-s" placeholder="Ex:John" />
                                <!--this was supposed to pop up when the user tries to go to payment without filling the forms-->
                                @error('fullname') <small class="text-red-700 block">{{$message}}</small> @enderror 
                            </div>
                            <div class="md:col-span-6 mb-3">
                                <label class="block">Phone Number</label>
                                <input type="text" wire:model.defer="phone" class="form-control mt-1 bg-m focus:bg-s focus:text-m border-m rounded-md shadow-sm text-s" placeholder="Ex:0123456789" />
                                <!--this was supposed to pop up when the user tries to go to payment without filling the forms-->
                                @error('phone') <small class="text-red-700 block">{{$message}}</small> @enderror
                            </div>
                            <div class="md:col-span-6 mb-3">
                                <label class="block">Email Address</label>
                                <input type="email" wire:model.defer="email" class="form-control mt-1 bg-m focus:bg-s focus:text-m border-m rounded-md shadow-sm text-s" placeholder="Ex:example@gmail.com" />
                                <!--this was supposed to pop up when the user tries to go to payment without filling the forms-->
                                @error('email') <small class="text-red-700 block">{{$message}}</small> @enderror
                            </div>
                            <div class="md:col-span-6 mb-3">
                                <label class="block">Pin-code (Zip-code)</label>
                                <input type="number" wire:model.defer="pincode" class="form-control mt-1 bg-m focus:bg-s focus:text-m border-m rounded-md shadow-sm text-s" placeholder="Ex:123456" />
                                <!--this was supposed to pop up when the user tries to go to payment without filling the forms-->
                                @error('pincode') <small class="text-red-700 block">{{$message}}</small> @enderror
                            </div>
                            <div class="md:col-span-6 mb-3">
                                <label class="block">Full Address</label>
                                <textarea wire:model.defer="address" class="form-control mt-1 bg-m h-32 focus:bg-s focus:text-m border-m rounded-md shadow-sm text-s" placeholder="Ex:street number, street name, region, and town/city, state." rows="2"></textarea>
                                <!--this was supposed to pop up when the user tries to go to payment without filling the forms-->
                                @error('address') <small class="text-red-700 block">{{$message}}</small> @enderror
                            </div>
                            <div class="md:col-span-6 mb-3">
                                <label class="block mb-2">Select Payment Mode: </label>
                                    <div class="tab-content md:col-span-9 pr-3" id="v-pills-tabContent">
                                        <!--this was supposed to have hidden clickable buttons using-->
                                        <div class="tab-pane fade mb-2" id="cashOnDeliveryTab">
                                            <button type="button" wire:click="codOrder" class="w-100 bg-m border-2 border-s hover:bg-s hover:text-m hover:border-m hover:border-2 text-s font-bold py-2 px-4 rounded inline-block">
                                                    Place Order (Cash on Delivery)
                                            </button>
                                        </div>
                                        <div class="tab-pane " id="onlinePayment">
                                            <form action="/session" method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input type="hidden" name="total" value="{{$this->totalProductAmount}}">
                                                <input type="hidden" name="pay" value="Online Payment" >
                                                <button type="submit" id="checkout-live-button" class="w-100 bg-m border-2 border-s hover:bg-s hover:text-m hover:border-m hover:border-2 text-s font-bold py-2 px-4 rounded inline-block">
                                                    Pay Now (Online Payment)
                                                </button>
                                            </form>
                                            
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
