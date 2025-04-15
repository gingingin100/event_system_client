<h2>Login</h2>
    <form action="/<?php echo APP_ROOT_DIR; ?>/login" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        
        <button type="submit">Login</button>
    </form>s