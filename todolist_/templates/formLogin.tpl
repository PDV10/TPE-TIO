{include 'header.tpl'}

<div class="mt-5 w-25 mx-auto">
    <form method="POST" action="verify">
        <div class="form-group">
            <label for="email">Correo</label>
            <input type="email" required class="form-control" id="email" name="email" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" required class="form-control" id="password" name="password">
        </div>

        {if $error} 
        <div class="alert alert-danger mt-3">
            {$error}
        </div>
        {/if}
        
        <button type="submit" class="btn btn-outline-dark mt-3">Entrar</button>
    </form>
</div>

{include file='footer.tpl'}

