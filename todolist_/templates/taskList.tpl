{include file='templates/header.tpl'}

<div class="row mt-4">
    <div class="col-md-4">
        <h1>{$tituloform}</h1>
        {include file='templates/formAlta.tpl'}
    </div>
    <div class="col-md-8">
        <h1>{$titulo}</h1>
        <ul class="list-group">
            {foreach from=$tasks item=$task}
                <li class="
                    list-group-item
                    d-flex
                    {if $task->finalizada} finalizada {/if}
                    ">
                        {$task->titulo} | {$task->descripcion|upper}
                        <div class="acciones ms-auto">
                            <a class="btn btn-sm btn-danger" href="borrar/{$task->id}">Borrar</a>
                            <a class="btn btn-sm btn-warning" href="showModificar/{$task->id}">Modificar</a>
                            {if !$task->finalizada}
                                <a class="btn btn-sm btn-success" href="completar/{$task->id}">Done</a>
                            {/if}
                        </div>
                </li>
            {/foreach}
        </ul>
    </div>
</div>

{include file='templates/footer.tpl'}
