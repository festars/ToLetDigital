<template>
    <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary shadow border-0">
            <div class="card-header bg-transparent">

                <!-- custom -->

                <button type="button" @click="hide" class="btn btn-icon">
                    <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                    <span class="btn-inner--text">Go back</span>
                </button>
                <!-- custom -->

            </div>
            <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                    <small>Create an account</small>
                </div>


                <div v-if="message" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-inner--text"><strong>Error! </strong> {{ message }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form role="form" @submit.prevent="register">




                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" placeholder="John Doe" autocomplete="off" v-model="form.name">
                            <p class="text-red text-xs italic" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></p>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="johndoe@gmail.com" autocomplete="off" v-model="form.email">
                            <p class="text-red text-xs italic" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></p>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="email">Phone Number</label>
                        <vue-tel-input v-model="form.phone" v-bind="bindProps" @onInput="onInput" ></vue-tel-input>

                        <p class="text-red text-xs italic" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></p>
                    </div>


                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label>Password</label>
                            <input class="form-control"  type="password" placeholder="******************" autocomplete="off" v-model="form.password">
                            <p class="text-red text-xs italic" v-if="form.errors.has('password')" v-text="form.errors.get('password')"></p>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Password Confirmation</label>
                            <input class="form-control"  type="password" placeholder="******************" autocomplete="off" v-model="form.password_confirmation">
                            <p class="text-red text-xs italic" v-if="form.errors.has('password_confirmation')" v-text="form.errors.get('password_confirmation')"></p>
                        </div>
                    </div>



                    <div class="custom-control custom-control-alternative custom-checkbox">
                        <input class="custom-control-input" name="company" v-model="form.company" type="checkbox" id="company">
                        <label class="custom-control-label" for="company">
                            I am a Company
                        </label>
                    </div>



                    <div class="form-row mb-3" v-if="form.company">
                        <div class="form-group col">
                            <label>Attach Company Certificate</label>
                            <input class="form-control" type="file" accept="image/*" name="certificate" v-on:change="onImageChange">
                            <p class="text-red text-xs italic" v-if="form.errors.has('certificate')" v-text="form.errors.get('certificate')"></p>
                        </div>
                        <div class="form-group col">
                            <label>Attach KRA PIN</label>
                            <input class="form-control" type="file" accept="image/*" name="pin" v-on:change="onImageChange">
                            <p class="text-red text-xs italic" v-if="form.errors.has('pin')" v-text="form.errors.get('pin')"></p>
                        </div>
                    </div>


                    <div class="custom-control custom-control-alternative custom-checkbox">
                        <input class="custom-control-input" name="terms" v-model="form.terms" type="checkbox" id="terms">
                        <label class="custom-control-label" for="terms">
                            Accept Terms and Conditions.
                        </label>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary my-4">Sign up</button>
                    </div>
                </form>
            </div>
        </div>


    </div>



</template>

<script>
    export default {
        mounted() {

        },
        components: {

        },

        data() {
            return {

                bindProps: {
                    defaultCountry: "KE",
                    disabledFetchingCountry: false,
                    disabled: false,
                    disabledFormatting: false,
                    placeholder: "Enter a phone number",
                    required: true,
                    enabledCountryCode: false,
                    enabledFlags: true,
                    preferredCountries: ["KE", "UG"],
                    onlyCountries: [],
                    ignoredCountries: [],
                    autocomplete: "off",
                    wrapperClasses: "",
                    inputClasses: "form-control",
                    inputOptions: {
                        showDialCode: false
                    }
                },
           form:new Form({
                    'name':'',
                    'email':'',
                    'password':'',
                    'password_confirmation':'',
                    'phone': '',
                    'terms':'',
                    'pin':'',
                    'certificate':'',
                    'company':'',
                }),

            }
        },

        methods: {
            hide() {
                //this.$modal.hide("login");
                location.replace('/login');
            },
          onImageChange(e){

                this.form[e.target.name] = e.target.files[0];
                

            },

            register(){
               //  e.preventDefault();

                let currentObj = this;

 

                const config = {

                    headers: { 'content-type': 'multipart/form-data' }

                }

 

                let formData = new FormData();
              
                formData.append('company', Boolean(this.form.company));
                formData.append('certificate', this.form.certificate);
                formData.append('pin', this.form.pin);
                formData.append('terms', this.form.terms);
                formData.append('phone', this.form.phone);
                formData.append('password_confirmation', this.form.password_confirmation);
                formData.append('name', this.form.name);
                formData.append('email', this.form.email);
                formData.append('password', this.form.password);

 

                axios.post('/register', formData, config)

                .then(function (response) {

                    currentObj.success = response.data.success;
                    
                    console.log(response.data.success);
                     location.replace('/');

                })

                .catch(function (error) {

                    currentObj.output = error;
                     location.replace('/');

                });
                // this.form.post('/register',{pin: this.pin})
                // .then(response => {
                  
                //   if (response.message){
                //     //console.log(response);
                //   // location.replace('/');
                //   }
                    
                // })
                // .catch(errors => {
                //   console.log(errors);
                // });
            },
            onInput({ number, isValid, country }) {
              //console.log(number, isValid, country);
            },
        },

        computed:{

        }
    }
</script>

<style>

</style>
