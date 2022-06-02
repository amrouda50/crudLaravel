
<template>
    <div>
        <nav-bar :logged-in="loggedIn"/>
        <div class="fcf-body">
            <div id="fcf-form">
                <h1 v-if="user"> Welcome {{user}}</h1>
                <h3 class="fcf-h3">Contact us</h3>
                <div v-if="errors.data"> {{errors.data}} </div>
                <form  @submit.prevent="submit" id="fcf-form-id" class="fcf-form-class">

                    <div class="fcf-form-group">
                        <label  for="Email" class="fcf-label">Recipient email address</label>
                        <div class="fcf-input-group">
                            <input v-model="form.email" type="email" id="Email" name="Email" class="fcf-form-control" required>
                        </div>
                    </div>

                    <div class="fcf-form-group">
                        <label  for="Message" class="fcf-label">Your message</label>
                        <div class="fcf-input-group">
                            <textarea v-model="form.message" id="Message" name="Message" class="fcf-form-control" rows="6" maxlength="3000" required></textarea>
                        </div>
                    </div>
                    <input @change="onfilechange" type="file" id="file" name="file" class="fcf-form-file" required>
                    <div class="fcf-form-group">
                        <button type="submit" id="fcf-button" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>


<script>
import NavBar from "../Components/NavBar"
export default {
    name: 'MainPage',
    components: { NavBar },
    props:{
     user : String,
        errors:Object,
        loggedIn : Boolean,
    },
    data() {
        return {
            form: {
                email: "",
                message: "",
                file : null,
            },
        }
    },
    methods: {
        onfilechange(e){
         this.form.file = e.target.files[0]
        },
        submit() {
            console.log(this.form)
            this.$inertia.visit
            ('/send-email',
                {
                    method : 'post',
                    data : this.form,
                    forceFormData:true,
                } )
        },
    },
}


</script>

<style >
#fcf-form {
    display:block;
}

.fcf-body {
    margin: 0;
    font-family: -apple-system, Arial, sans-serif;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    background-color: #fff;
    padding: 30px;
    padding-bottom: 10px;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    max-width: 100%;
}

.fcf-form-group {
    margin-bottom: 1rem;
}

.fcf-input-group {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -ms-flex-align: stretch;
    align-items: stretch;
    width: 100%;
}

.fcf-form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    outline: none;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.fcf-form-file{
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
}

.fcf-form-control:focus {
    border: 1px solid #313131;
}

select.fcf-form-control[size], select.fcf-form-control[multiple] {
    height: auto;
}

textarea.fcf-form-control {
    font-family: -apple-system, Arial, sans-serif;
    height: auto;
}

label.fcf-label {
    display: inline-block;
    margin-bottom: 0.5rem;
}

</style>
