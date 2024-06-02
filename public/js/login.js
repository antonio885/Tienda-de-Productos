function login(){
    axios.post('login',{
        'Usuario': txtusuario.value,
        'password': txtpassword.value
    })
    .then(res => {
        console.log(res)
        
    })
    .catch(err => {
        console.error(err); 
    })
}