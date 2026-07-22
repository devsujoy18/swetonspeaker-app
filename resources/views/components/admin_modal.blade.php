@props(['name','title'])

<div 
x-data="{ show : false, name : '{{ $name }}' }"
x-show="show"
x-on:open-modal.window="console.log('ok'); show = ($event.detail.name === name)"
x-on:close-modal.window="show = false"
x-transition
style="display: none;" 
class="al-modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            
            <h4 class="modal-title">
              {{ $title ?? 'Header' }}
            </h4>
            <button type="button" class="close" x-on:click="$dispatch('close-modal')">&times;</button>
        </div>
        <div class="modal-body">
          {{ $modalBody }}
        </div>
    </div>
  </div>
</div>