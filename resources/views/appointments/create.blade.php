@extends('layouts.app')
@section('content')
    <div 
    x-data="{step:1, hasError:false, errorMessage:'',back(){
        this.step --;
        this.hasError = false;
    }, next(){
        if(this.step == 1){
            if((this.$refs.name.value.length != 0 && this.$refs.address.value.length)){
                this.step++;
                this.hasError=false
            }else {
                this.hasError=true
                this.errorMessage=`Please Field All Required fields.`
            }
        }else if(this.step == 2){
            if(this.$refs.selected.value.length != 0){
                this.step++;
                this.hasError=false
            }else {
                this.hasError=true
                this.errorMessage=`Please select service(s)`
            }
        }else if(this.step == 3){
            if(this.$refs.email.value.length != 0 && this.$refs.mobile.value.length != 0 && this.$refs.datetime.value.length != 0){
                this.$refs.form.submit();
            }else {
                this.hasError=true
                this.errorMessage=`Please Field All Required fields.`
            }
        }
    }}" class="flex justify-center items-center w-screen ">

        <div class="shadow rounded p-6 max-w-6xl w-full lg:mt-6">
            <div class="text-2xl">
                Step <span x-text="step"></span>
            </div>
            <form x-ref="form" action="{{ route('appointments.store') }}" method="POST">
                @csrf
                <div class="bg-red-300 rounded p-2 text-red-900 my-2" x-show.transition="hasError">
                    <div x-text="errorMessage"></div>
                </div>
                <div class="border-l-2 border-gray-500 my-2 p-6" x-show.transition="step == 1">
                    <div>
                        <label for="">Name</label>
                        <input x-ref="name" type="text" class="input" name="attendee_name" placeholder="Enter your name here">
                    </div>
                    <div class="mt-5">
                        <label for="">Gender</label>
                        <select name="attendee_gender" id="" class="input">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="mt-5">
                        <label for="">Address</label>
                        <input x-ref="address" type="text" name="attendee_address" class="input" placeholder="Enter your Address here">
                    </div>
                </div>
                <div class="border-l-2 border-gray-500 my-2 p-6" x-show.transition="step == 2">
                    @livewire('service-selector')
                </div>
                <div class="border-l-2 border-gray-500 my-2 p-6" x-show.transition="step == 3">
                    <div>
                        <label for="">Preffered Date Schedule</label>
                        <input x-ref="datetime" type="datetime-local" name="datetime" class="input">
                    </div>
                    <div class="mt-5">
                        <label for="">Email</label>
                        <input x-ref="email" type="email" class="input" name="attendee_email" placeholder="Enter your Email here">
                    </div>
                    <div class="mt-5">
                        <label for="">Mobile Number</label>
                        <input x-ref="mobile" type="number" name="attendee_mobile" class="input" placeholder="Enter your Mobile Number here">
                    </div>
                </div>
            </form>
            <div class="flex px-6" :class="{'justify-end':step == 1, 'justify-between':step != 1}">
                <button class="p-1 px-4 bg-blue-500 text-white rounded" x-on:click="back()" x-show="step != 1">Back</button>
                <button class="p-1 px-4 bg-blue-500 text-white rounded" x-on:click="next()">
                    <div x-show="step != 3">Next</div>
                    <div x-show="step == 3">Submit</div>
                </button>
            </div>
        </div>
    </div>
@endsection

