<template>
    <div>
        <toolbar/>
        <router-view/>
        <app-footer/>
    </div>
</template>
<script>
    import toolbar from './Toolbar'
    import AppFooter from './AppFooter'
    import Login from './login/Login'

    export default{
        components:{
            toolbar,
            AppFooter,
            Login
        }
    }
</script>
