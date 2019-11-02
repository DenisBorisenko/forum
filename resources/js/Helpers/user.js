class User{
    login(form){
        axios.post('api/auth/login',form)
            .then(res => { console.log(res) })
            .catch(err =>{ console.log(err.response.data)} )
    }
}

export default User = new User()
