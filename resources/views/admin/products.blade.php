@extends('layouts.main')
@section('content')
<h1 style="color: green; background: black;"> Edit catalog </h1>
@if (session('success'))
<div class="msg msg-success">
    <button class="close-btn"><i class="fa-solid fa-xmark"></i></button>
    <p> Product deleted successfuly </p>
</div>
@elseif (session('error'))
<div class="msg msg-error">
    <button class="close-btn"><i class="fa-solid fa-xmark"></i></button>
    <p> Product not found </p>
</div>
@endif








<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <h1>Edit panel</h1>
    
    <style>
        :root{
    --width: 55em;

}

body {
    overflow-x: visible;
}

.content-wrapper {
    width: calc(100vw - 244px);
}

.table
{
    table-layout: fixed;
    width: var(--width);
    text-align: left;
}
.editable-parameter {
    position: relative;
    overflow: hidden;
    text-overflow: ellipsis;
}

.input-number {
  pointer-events: none;
  position: inline-block;
  display: block;
  display: none;
  border: dashed lightgrey 0.1rem;
  width: 3.5rem;
  margin-top: 0.41rem;
}

.subsection-row .input-number {
    font-size: 14px;
    margin-top: 0;
    height: 2rem;
    max-width: 2.7rem;
}

.btn-number {
    margin-top: 0.41rem;
}

.subsection-row .btn-number{
    margin-top: 0;
}

.input-group-btn {
    display: flex;
    flex-direction: column;
}

.input-group-btn button {
    border:none;
    background: transparent;
    padding: 0;
    padding-top: 0px;
    font-size: 16px;
    line-height: 0;
}

.btn-add-empty {
    color: dodgerblue;
    border: dashed 0.15rem;
    background: transparent;
    border-radius: 0.5rem;
    padding: 0.2rem 1rem;
    margin-bottom: 1.5rem;
    width: var(--width);
}

.copy-button {
    display: inline-flex;
    color: #0d6efd;
    border: none;
}

.copy-button:hover{
        color: #0a58cc;
    }

    /* Styles for section rows */
.section-row {
  font-size: 18px;
  font-weight: bold;
  background-color: #f0f0f0;
  padding: 10px;
  margin-bottom: 5px;
}

/* Styles for subsection rows */
.subsection-row {
  font-size: 14px;
}

.addSubsectionButton {
    font-size: 32px;
}

.delete_record_subsection {
    display: block;
    padding-top: 0.4rem;
}

.selection-dropdown {
    border: lightgray solid 0.1rem;
    border-radius: 0.4rem;
}

.selection-dropdown option {
    border: lightgray solid 0.1rem;
    border-radius: 0.4rem;
}

.dropdown {
    width: 100%;
}

</style>








<!-- Add buttons -->
<a href="{{ route('admin.product.add') }}">Add product<i class="fa-solid fa-add"></i></a>
<button class="open-modal">Upload .xls<i class="fa-solid fa-image"></i></button> 
    <dialog class="modal-window" id="modal">
        <button class="close-button"><i class="fa-solid fa-xmark"></i></button>
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="products">Upload products file:</label>
                <input type="file" name="images[]" accept=".xls,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel.sheet.macroEnabled.12" class="form-control" multiple required>
            </div>
            <button type="submit" class="btn-primary-wide">Save</button>
            
        </form>
    </dialog>

<!-- Product grid -->
<div class="product-grid">
    @foreach ($products as $product)
    <div class="product-square">
        <a href="{{ route('admin.product.show', ['id' => $product->id]) }}">
            <div class="image-container">
                <img class="cover-img" src="{{asset($product->images ? 'product_images/'.$product->images->first()->image : '')}}">
                <div class="overlay">
                    <span class="edit-icon">&#9998;</span>
                </div>
            </div>
        <h3><strong> {{$product->title}} </strong></h3>
        <p class="description">{{$product->description}}</p>
        </a>
        <form class="delete-product-form" action="{{ route('admin.product.delete', ['id' => $product->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button"><i class="fa-solid fa-trash-can delete-icon"></i></button>
        </form>
    </div>
    @endforeach
</div>

@endsection

@section('scripts')

<script type="text/javascript">
   
    const modal = document.querySelector('#modal');
    const openModal = document.querySelector('.open-modal');
    const closeModal = document.querySelector('.close-button');

    openModal.addEventListener('click', () => {
        modal.showModal();
    })
    closeModal.addEventListener('click', () => {
        modal.close();
    })

    $('#btnUploadCancel').click(function(){
	$('#upload-avatar').modal('toggle');
});

</script>
@endsection