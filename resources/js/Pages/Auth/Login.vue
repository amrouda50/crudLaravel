<template>
    <div>
        <nav-bar :logged-in="loggedIn"/>
        <form @submit.prevent="submit" >
            <div class="imgcontainer">
                <img src="https://cdn4.iconfinder.com/data/icons/avatars-xmas-giveaway/128/batman_hero_avatar_comics-1024.png" alt="Avatar" class="avatar">
            </div>
            <div v-if="errors.data"> {{errors.data}} </div>
            <div class="container">
                <label for="uname"><b>Email</b></label>
                <input type="text" v-model="form.email" placeholder="Enter Email" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" v-model="form.password" placeholder="Enter Password" name="psw" required>

                <button type="submit">Login</button>

            </div>
        </form>
    </div>
</template>


<script>
import NavBar from "../../Components/NavBar"
export default {
    name: 'Login',
    components: {NavBar},
    props: {
        errors: Object,
        loggedIn : Boolean,
    },
    data() {
        return {
            error: '',
            form: {
                email: "",
                password: "",
            },
        }
    },
    methods: {
        submit() {
            this.$inertia.visit
                ('/auth',
                    {
                        method : 'post',
                        data : this.form,
                    } )
        },
    },
}

</script>

<style>
form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #04AA6D;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}


.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}


img.avatar {
    width: 40%;
    border-radius: 50%;
}


.container {
    padding: 16px;
}


</style>
