  	jQuery('.select2').select2({
    tags: true,
    data: [],
    tokenSeparators: [','], 
    placeholder: "Add your tags here",
    /* the next 2 lines make sure the user can click away after typing and not lose the new tag */
    selectOnClose: true, 
    closeOnSelect: false
});


 jQuery('.js-example-basic-multiple').select2({
 	maximumSelectionLength: 3,
 	
    
 });