<html lang="en">
    <body>
        <div class="cards" style="margin: auto;">
            <div class="card" style="padding:20px 20px">
                <form action="." method="post">
                    <input type="hidden" name="action" value="login">
                    <input style="text-align:center;" class="mainButton" type="email" name="email" placeholder="Email">
                    <input style="text-align:center;" class="mainButton" type="password" name = "password" placeholder="Password">
                    <input class="mainButton" type="submit" value="Login">
                </form>
                <form action="." method="post">
                    <input type="hidden" name="action" value="register_view">
                    <input class="mainButton" type="submit" value="Register">
                </form>
            </div>
        </div>
    </body>
</html>