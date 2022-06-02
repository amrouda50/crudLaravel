<template>
    <div>
        <nav-bar :logged-in="loggedIn"/>
             <div>
                 <p >This is the user's name : {{user.name}}</p>
                 <p >This is the user's email : {{user.email}}</p>
                 </div>
    </div>
</template>


<script>
import NavBar from "../../Components/NavBar"
export default {
    name: 'Login',
    components: {NavBar},
    props: {
        loggedIn : Boolean,
        user: Object,
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
