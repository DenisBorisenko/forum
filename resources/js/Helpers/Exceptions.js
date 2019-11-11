import User from "./user"
class Exceptions{
    handle(error){
        this.isExpired(error.response.data.error)
    }
    isExpired(error){
        if(error == 'Token is ivalid'){
            User.logout()
        }
    }
}
export default Exceptions = new Exceptions()
