<template>
  <div>
       <div >
            <div>
                <a class="hiddenanchor" id="signup"></a>
                <a class="hiddenanchor" id="signin"></a>

                <div class="login_wrapper">
                    <div class="animate form login_form">
                    <section class="login_content">
                        <form>
                        <h1>Login Form</h1>
                        <div>
                            <input type="text"  v-model="userName" class="form-control" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="password"  v-model="passWord" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <a class="btn btn-default submit"  @click="Login">Log in</a>
                            <a class="reset_pass" href="#">Lost your password?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">New to site?
                            <a href="#signup" class="to_register"> Create Account </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                            </div>
                        </div>
                        </form>
                    </section>
                    </div>
                </div>
            </div>
        </div>
  </div>
</template>

<script>
export default {
    name: "Login",
    data(){
        return{
            userName:'',
            passWord:''
        }
    },
    computed:{

    },
    methods:{
        Login(){

            this.$store.dispatch('retriveToken',{
                    username:this.userName,
                    password:this.passWord
            })
            .then(response=>{
                
            })
        }
    }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
