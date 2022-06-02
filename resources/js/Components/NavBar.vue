<template>
    <div>
        <div class="topnav">
            <a class="active" href="/">Home</a>
            <a v-if="!loggedIn" href="/login">Login</a>
            <a v-else href="/logout">Logout</a>
        </div>
    </div>
</template>


<script>

export default {
    name: 'NavBar',
    props:{
        loggedIn : Boolean,
    },
}


</script>

<style scoped>

.topnav {
    background-color: #333;
    overflow: hidden;
}

.topnav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

.topnav a:hover {
    background-color: #ddd;
    color: black;
}

.topnav a.active {
    background-color: #04AA6D;
    color: white;
}
</style>
