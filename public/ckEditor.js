//short desc
function MyCustomUploadAdapterPlugin( editor ) 
{
editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
    // Configure the URL to the upload script in your back-end here!
    return new MyUploadAdapter( loader );
};
}
ClassicEditor
    .create( document.querySelector('#short_desc'), {
    extraPlugins: [ MyCustomUploadAdapterPlugin ],

    // ...
})
.catch( error => {
  console.error( error );
});
//long desc
function MyCustomUploadAdapterPlugin( editor ) 
{
editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
    // Configure the URL to the upload script in your back-end here!
    return new MyUploadAdapter( loader );
};
}
ClassicEditor
    .create( document.querySelector('#long_desc'), {
    extraPlugins: [ MyCustomUploadAdapterPlugin ],

    // ...
})
.catch( error => {
  console.error( error );
});