<template>
<div>
    <div role="form" class="wpcf7" id="wpcf7-f340-p128-o1" lang="en-US" dir="ltr">
        <div class="screen-reader-response"></div>    
        <form @submit.prevent="onSubmit" method="post" class="wpcf7-form" novalidate="novalidate">
            <div style="display: none;">
                <input type="hidden" name="_wpcf7" value="340" />
                <input type="hidden" name="_wpcf7_version" value="5.1.7" />
                <input type="hidden" name="_wpcf7_locale" value="en_US" />
                <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f340-p128-o1" />
                <input type="hidden" name="_wpcf7_container_post" value="128" />
            </div>
            <div class="single-field">
                <span class="wpcf7-form-control-wrap first-name">
                    <input type="text" v-model="contacts.contact_name" name="first-name" value="" size="40" class="wpcf7-form-control wpcf7-text" placeholder="First Name (required)" />
                    <span role="alert" v-if="form.errors.has('contact_name')" v-text="form.errors.first('contact_name')" class="wpcf7-not-valid-tip"></span>                
                </span>
            </div>
            <div class="two-fields clearfix">
                <span class="wpcf7-form-control-wrap your-email">
                    <input type="email" v-model="contacts.contact_email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text" placeholder="Your Email (required)" />
                    <span role="alert" v-if="form.errors.has('contact_email')" v-text="form.errors.first('contact_email')" class="wpcf7-not-valid-tip"></span>                
                </span>
                <span class="wpcf7-form-control-wrap your-phone">
                    <input type="text" v-model="contacts.contact_phone" name="your-phone" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Phone No:" />
                    <span role="alert" v-if="form.errors.has('contact_phone')" v-text="form.errors.first('contact_phone')" class="wpcf7-not-valid-tip"></span>                
                </span>
            </div>
            <div class="single-field">
                <span class="wpcf7-form-control-wrap your-subject">
                    <input type="text" v-model="contacts.contact_subject" name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Subject" />
                    <span role="alert" v-if="form.errors.has('contact_subject')" v-text="form.errors.first('contact_subject')" class="wpcf7-not-valid-tip"></span>                
                </span>
            </div>
            <div class="single-field">
                <span class="wpcf7-form-control-wrap your-message">
                    <textarea  v-model="contacts.contact_message" name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Your Message"></textarea>
                    <span role="alert" v-if="form.errors.has('contact_message')" v-text="form.errors.first('contact_message')" class="wpcf7-not-valid-tip"></span>                
                </span>
            </div>
            <p>
                <input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit">
                <span class="ajax-loader"></span>
            </p>
            <div class="wpcf7-response-output wpcf7-display-none"></div>    
        </form>    
    </div>
</div>

</template>

<script>
    import Form from 'form-backend-validation';

    export default {
        data() {
            return {
                contacts: {},
                form: new Form(),
                loading: true
            }
        },
        computed: {
            old(value){
                return value + ' teste';
            }
        },
        created() {
            //this.getContacts();
        },
        methods: {
            onSubmit(){
                this.form = new Form(this.contacts);
                this.form.post(`${Laravel._BASE_URL}/api/contact`)
                .then((response) => {
                    console.log(response);

                })
                .finally(() => {

                })
            }
        }
    }
</script>
