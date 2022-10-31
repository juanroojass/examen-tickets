<div>
    <input wire:model="search" type="search" placeholder="Search users..."/>
    <ul>
        @foreach($datos_estatus as $s)
            <li>{{ $s->estatus }}</li>
        @endforeach
    </ul>
</div>

