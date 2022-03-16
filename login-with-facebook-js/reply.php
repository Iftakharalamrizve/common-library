
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Reply </title>
</head>
<body>
    <!--**********************************
              CHAT UI Style
 ***********************************-->
<style>

/*Scrollbar*/
.cc-chat-ui-area * {
    scrollbar-width: thin;
    scrollbar-color: rgb(187, 29, 45), rgba(0, 0, 0, 0.099);
}

.cc-chat-ui-area ::-webkit-scrollbar {
    width: 4px; /* for vertical scrollbars */
    height: auto; /* for horizontal scrollbars */
}

.cc-chat-ui-area ::-webkit-scrollbar-track {
    background: rgba(236, 236, 236, 0.8);
}

.cc-chat-ui-area ::-webkit-scrollbar-thumb {
    background: rgb(227, 227, 227);
    border-radius: 30px;
}

/*End Scrollbar*/


.cc-chat-ui-area {
    /*background-color: rgb(245, 245, 245);*/
    background-image: url("././assets/images/dots.png");
    background-repeat: repeat;
    background-blend-mode: lighten;
    background-position: right center;
    padding: 1rem;
    overflow: hidden;
    display: flex;
    justify-content: space-between;
    gap: 30px;
    min-height: 76vh;
}
@media all and (max-width: 960px) {
    .cc-chat-ui-area {
        /*background-color: rgb(245, 245, 245);*/
        background-image: url("././assets/images/dots.png");
        background-repeat: repeat;
        background-blend-mode: lighten;
        background-position: right center;
        padding: 1rem;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 30px;
        min-height: 100%;
    }
}

.cc-insta-post-area {
    flex-basis: 50%;
}

.cc-chat-ui-main {
    flex-basis: 50%;
    width: 50%;
    background-color: #efefef;
    margin: auto;
    display: block;
    height: 75vh;
    position: relative;
    padding: 1rem;
    border-radius: 1rem;
    box-shadow: 0 0 2px rgba(255, 255, 255, 0.9);
}
@media all and (max-width: 960px){
    .cc-chat-ui-main{
        flex-basis: 100%;
        width: 100%;
    }
}

.cc-chat-ui-footer {
    position: absolute;
    /*background-color: #ffffff;*/
    border-radius: 5px;
    padding: 1rem;
    height: 100px;
    width: 100%;
    bottom: 0;
    left: 0;
    right: 0;
}

.cc-chat-ui-footer-form {
    display: flex;
    gap: 20px;
    justify-content: space-between;
    align-items: center;
    width: 96%;
    overflow: hidden;
}

.cc-insta-attachment {
    position: relative;
}

.cc-insta-attachment i {
    display: inline-block;
    font-size: 2rem;
    line-height: 1;
    color: #7a7a7a;
    cursor: pointer;
}

.cc-insta-attachment input[type=file] {
    position: absolute;
    visibility: hidden;
    width: 0;
    height: 0;
}

.cc-insta-textarea {
    flex-grow: 1;
}

.cc-insta-textarea textarea {
    transition: all 0.4s ease-in-out;
    padding: 0.5rem;
    border: 1px solid #dddddd;
    display: block;
    width: 100%;
    border-radius: 10px;
}

.cc-insta-textarea textarea:focus {
    border: 1px solid #1fb5ac;
    outline: none;
}

span.cc-insta-send button {
    border: none;
    display: inline-block;
    background-color: #df1a22;
    color: #ffffff;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    box-shadow: 0 0 2px rgba(0, 0, 0, 0.4);
    text-align: center;
    vertical-align: middle;
}

span.cc-insta-send button i {
    font-size: 1.2rem;
    line-height: 1;
}

/*============================
         Single Chat UI
  ============================*/
.cc-chat-ui-body {
    margin: auto;
    max-height: 62vh;
    overflow-y: auto;
    overscroll-behavior-y: contain;
    scroll-snap-type: y proximity;
}

.cc-chat-ui-body ul {
    margin: 0;
    padding: 0;
    display: block;
}

.cc-chat-ui-body li {
    list-style: none;
    display: block;
    margin-bottom: 1.5rem;
}

.cc-chat-ui-body li:last-child {
    scroll-snap-align: end;
}

.cc-msg-self {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    padding: 0.5rem;
}

.cc-msg-client {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    padding: 0.5rem;
    flex-direction: row-reverse;
    width: 100%;
}
.cc-msg-client + .cc-msg-time small {
   float: right;
    margin-right: 1rem;
}

.cc-msg-self.cc-msg-text-area .cc-msg-text {
    background-color: #ffffff;
    min-height: 50px;
    display: flex;
    align-content: center;
    text-align: left;
    flex-grow: 1;
    width: 100%;
    padding: 0.5rem;
    position: relative;
    border-radius: 10px;

}

.cc-msg-self.cc-msg-text-area .cc-msg-text::after {
    content: " ";
    position: absolute;
    width: 0;
    height: 0;
    left: auto;
    right: -15px;
    top: 50%;
    transform: translateY(-50%);
    bottom: auto;
    border-color: #ffffff transparent transparent #ffffff;
    border-style: solid;
    border-width: 12px;

}

.cc-msg-client.cc-msg-text-area .cc-msg-text {
    background-color: #ced1d2;
    min-height: 50px;
    display: flex;
    align-content: center;
    text-align: left;
    flex-grow: 1;
    width: 100%;
    padding: 0.5rem;
    position: relative;
    border-radius: 10px;
    color: #181818;
}

.cc-msg-client.cc-msg-text-area .cc-msg-text::before {
    content: " ";
    position: absolute;
    width: 0;
    height: 0;
    right: auto;
    left: -15px;
    top: 50%;
    transform: translateY(-50%);
    bottom: auto;
    border-color: transparent #ced1d2 #ced1d2 transparent;
    border-style: solid;
    border-width: 12px;

}

.cc-msg-author img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
}

.cc-msg-time {
    margin-left: 1rem;
}

.cc-insta-post-area{
    background-color: #ededed;
    padding: 1rem;
    border-radius: 1rem;
}

.cc-insta-post-image{
    margin-bottom: 1rem;
}

.cc-insta-post-image img{
    height: 400px;
    width: 100%;
    object-fit: cover;
    object-position: center;
    aspect-ratio: 1/1;
}

.ccpro-back-btn{
    display: flex;
    justify-content:flex-end;
    margin-right: 2rem;
}

.ccpro-back-btn-action{
    background-color: coral;
    color:#ffffff;
    padding: 0.3rem 1rem;
    text-decoration: none;
    border:none;
}
</style>
<!--End Chat UI Style-->


<!--**********************************
          CHAT UI MARKUP
***********************************-->

<div class="ccpro-back-btn">
	<button class="btn btn-info btn-sm ccpro-back-btn-action"  onclick="logoutFunction()" > Logout </button>
</div>

<div class="cc-chat-ui-area">



<!--    Instagram Post-->
<div class="cc-insta-post-area">
    <h4>Instagram Post</h4>
    <div class="cc-insta-single-post">
        <div class="cc-insta-post-image">
            <!-- <img class="img-responsive" src="insta-post.jpg" alt=""> -->
            <p>No post found</p>
            <div class="cc-insta-post-date">
                <small>23-Jan-2022 12:18:31 PM</small>
            </div>
        </div>
        <div class="cc-insta-post-meta">
            <div class="cc-insta-post-title">
                <h3>Lorem ipsum dolor sit amet.</h3>
                <p>Media ID: <?php echo $_GET['m_id']; ?></p>
            </div>
            <div class="cc-insta-post-description">
                <p>
                    No details Found
                </p>
            </div>
        </div>

    </div>
</div>
<!--  End  Instagram Post-->


<div class="cc-chat-ui-main">

    <!--        Chat Body-->
    <div class="cc-chat-ui-body">

        <ul>
            <li>
                <div class="cc-common-msg">
                    <div class="cc-msg-self cc-msg-text-area">
                        <div class="cc-msg-text"><?php echo $_GET['content']; ?></div>
                        <div class="cc-msg-author">
                            <img src="man.jpg" alt="">
                        </div>
                    </div>
                    <div class="cc-msg-time">
                        <small><?php echo $_GET['create_date']; ?></small>
                    </div>
                </div>
            </li>
            
            
            <!-- <li>
                <div class="cc-common-msg">
                    <div class="cc-msg-client cc-msg-text-area">
                        <div class="cc-msg-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi
                            modi porro saepe sapiente voluptates. Cum cupiditate deleniti distinctio incidunt labore
                            libero maxime molestiae, natus neque numquam obcaecati perferendis quisquam reiciendis.
                        </div>
                        <div class="cc-msg-author">
                            <img src="women.jpg" alt="">
                        </div>
                    </div>
                    <div class="cc-msg-time">
                        <small>23-Jan-2022 12:18:31 PM</small>
                    </div>

                <div class="cc-common-msg">
                    <div class="cc-msg-self cc-msg-text-area">
                        <div class="cc-msg-text">Lorem ipsum dolor sit amet.</div>
                        <div class="cc-msg-author">
                            <img src="man.jpg" alt="">
                        </div>
                    </div>
                    <div class="cc-msg-time">
                        <small>23-Jan-2022 12:18:31 PM</small>
                    </div>
                </div>
            </li> -->
        </ul>

    </div>

    <!--        Chat Footer-->
    <div class="cc-chat-ui-footer">
        <form action="">
            <div class="cc-chat-ui-footer-form">

                <span class="cc-insta-attachment">
                    <label for="cc-insta-attachment">
                        <i class="fa fa-paperclip"></i>
                        <input type="file" name="" id="cc-insta-attachment">
                    </label>
                </span>

                <span class="cc-insta-textarea">
                    <textarea name="" id="" placeholder="Write Here...."></textarea>
                </span>

                <span class="cc-insta-send">
                    <button type="submit"> <i class="fa fa-paper-plane"></i></button>
                </span>
            </div>
        </form>
    </div>

</div>

</div>
<script src="script.js"></script>
<!--End CHAT UI MARKUP-->
</body>
</html>

