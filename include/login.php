<!--Chris Earle- the modal html code along with js to close on click outside modal-->
<!-- The Modal -->
<div id="loginModal" class="modal">
    <!-- Modal Content -->
    <form class="modal-content animate" action="/action_page.php">

    <div>
        <!--the little x to close the modal-->
        <span onclick="document.getElementById('loginModal').style.display='none'"
        class="close">&times;</span>

        <label for="username"><b>Username: </b></label>
        <input type="text" placeholder="Enter Username" name="username" required>
        <br/>

        <label for="password"><b>Password: </b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
        <br/>

        <button class="buttons" type="submit">Login</button>

        <!--we can remove the remember me later, might be lots of work-->
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
    </div>
        <!--we can remove the forgot password later, might be lots of work-->
        <div class="container" style="background-color:#f1f1f1">
            <button class="buttons" type="button" onclick="document.getElementById('loginModal').style.display='none'" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('loginModal');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
