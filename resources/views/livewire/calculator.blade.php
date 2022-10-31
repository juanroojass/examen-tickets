<div>
   <div>
        <div>
            <input type="number" wire:model="number1" name="" id="" placeholder="number1">
            <select name="" id="" wire:model="action">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
                <option value="%">%</option>
            </select>
            <input type="number" wire:model="number2" name="" id="" placeholder="number2">
            <button wire:click="calculate" {{$disabled ? 'disabled': ''}}>Calculate</button>
            <p>Result: {{$result}}</p>
        </div>
        
    </div>
    
</div>
