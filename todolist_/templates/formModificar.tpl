<div class="container">
    <form action="modificar" method="POST">
        <div class="mb-3">
                <input type="hidden" name="id" class="form-control" value="{$id}">
                
                <label for="disabledTextInput" class="form-label">titulo</label>
                <input type="text" name="titulo" class="form-control" value="{$titulo}">

                <label for="disabledTextInput" class="form-label">Descripcion</label>
                <input type="text" name="descripcion" class="form-control" value="{$descripcion}">

                <label for="disabledTextInput" class="form-label">prioridad</label>
                <input type="number" name="prioridad" class="form-control" value="{$prioridad}">
        </div>
        <button type="submit" class="btn btn-primary">Modificar</button>
    </form>
</div>