var modal=document.getElementById('modal');var modalOpen=document.getElementById('create-contact');var modalClose=document.querySelectorAll('.modal-close');modalOpen.addEventListener('click',()=>{modal.style.display='block'});modalClose.forEach(button=>{button.addEventListener('click',()=>{modal.style.display='none'})});$("#createContact").submit(function(e){e.preventDefault();var nom=$('#nom').val();var prenom=$('#prenom').val();var email=$('#email').val();var entreprise=$('#entreprise').val();var address=$('#address').val();var code_postal=$('#zipcode').val();var ville=$('#city').val();var status=$('#status').val();$('#errors').empty();$.ajax({url:'/store-contact',type:'POST',data:{_token:$('meta[name="csrf-token"]').attr('content'),nom:nom,prenom:prenom,email:email,entreprise:entreprise,address:address,code_postal:code_postal,ville:ville,status:status},success:function(response){if(response.status===333){$('#errors').empty();$.each(response.errors,function(field,messages){$.each(messages,function(index,message){let errorEl=`<div class="bg-red-100 border mb-2 border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"><strong class="font-bold">${message}</strong></div>`;$('#errors').append(errorEl)})});return false}if(response.status===888){$('#ex-nom').val(nom);$('#ex-prenom').val(prenom);$('#ex-email').val(email);$('#ex-entreprise').val(entreprise);$('#ex-address').val(address);$('#ex-zipcode').val(code_postal);$('#ex-city').val(ville);$('#ex-status').val(status);modal.style.display='none';var modalOpen=document.getElementById('exists-contact');modalOpen.style.display='block'}if(response.status===true){modal.style.display='none';location.reload()}},error:function(xhr,status,error){if(xhr.status===400){alert("Bad request: "+xhr.responseText)}else if(xhr.status===404){alert("Resource not found")}else{alert("An error occurred: "+error)}}})});var deleteModal=document.getElementById('delete-modal');var selectedRow;function deleteContact(id,rowId){deleteModal.style.display='block';selectedRow=document.getElementById(rowId)}function handleFormSubmission(id){$("#formDelete").submit(function(e){e.preventDefault();$.ajax({url:'/destroy/contact/'+id,type:'DELETE',data:{_token:$('input[name="_token"]').val()},success:function(response){deleteModal.style.display='none';Swal.fire({position:"top-end",icon:"success",title:"Contact deleted successfully!",showConfirmButton:false,timer:1500});if(selectedRow){selectedRow.remove();selectedRow=null}},error:function(response){Swal.fire('Error!','There was an error deleting the category.','error')}})})}document.getElementById('close-modal-delete').addEventListener('click',()=>{deleteModal.style.display='none'});$(document).ready(function(){handleFormSubmission()});var showContactModal=document.getElementById('showModal');function showContact(id){fetch('/show/contact/'+id).then(response=>response.json()).then(contact=>{document.getElementById("contact-nom").value=contact.nom;document.getElementById("contact-prenom").value=contact.prenom;document.getElementById("contact-email").value=contact.email;document.getElementById("contact-entreprise").value=contact.entreprise;document.getElementById("contact-address").value=contact.address;document.getElementById("contact-zipcode").value=contact.code_postal;document.getElementById("contact-city").value=contact.ville;var statusSelect=document.getElementById("contact-status");statusSelect.value=contact.status;showContactModal.style.display='block'}).catch(error=>console.error('Error fetching contact:',error))}modalClose.forEach(button=>{button.addEventListener('click',()=>{showContactModal.style.display='none'})});var showModal=document.getElementById('editModal');function editContact(id){fetch('/show/contact/'+id).then(response=>response.json()).then(contact=>{$("#edit-id").val(contact.id);$("#edit-nom").val(contact.nom);$("#edit-nom").val(contact.nom);$("#edit-prenom").val(contact.prenom);$("#edit-email").val(contact.email);$("#edit-entreprise").val(contact.entreprise);$("#edit-address").val(contact.address);$("#edit-zipcode").val(contact.code_postal);$("#edit-city").val(contact.ville);var statusSelect=document.getElementById("edit-status");statusSelect.value=contact.status;showModal.style.display='block'}).catch(error=>alert(error))}modalClose.forEach(button=>{button.addEventListener('click',()=>{showModal.style.display='none'})});$("#editContact").submit(function(e){e.preventDefault();var id=$('#edit-id').val();var nom=$('#edit-nom').val();var prenom=$('#edit-prenom').val();var email=$('#edit-email').val();var entreprise=$('#edit-entreprise').val();var address=$('#edit-address').val();var code_postal=$('#edit-zipcode').val();var ville=$('#edit-city').val();var status=$('#edit-status').val();console.log(id);console.log(nom);console.log(prenom);console.log(email);console.log(entreprise);console.log(address);console.log(code_postal);console.log(ville);console.log(status);$('#edit-errors').empty();$.ajax({url:'/update/contact',type:'POST',data:{_token:$('meta[name="csrf-token"]').attr('content'),id:id,nom:nom,prenom:prenom,email:email,entreprise:entreprise,address:address,code_postal:code_postal,ville:ville,status:status},success:function(response){if(response.status===333){$('#edit-errors').empty();$.each(response.errors,function(field,messages){$.each(messages,function(index,message){let errorEl=`<div class="bg-red-100 border mb-2 border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"><strong class="font-bold">${message}</strong></div>`;$('#edit-errors').append(errorEl)})});return false}if(response.status===888){$('#update-id').val(id);$('#update-nom').val(nom);$('#update-prenom').val(prenom);$('#update-email').val(email);$('#update-entreprise').val(entreprise);$('#update-address').val(address);$('#update-zipcode').val(code_postal);$('#update-city').val(ville);$('#update-status').val(status);modal.style.display='none';var modalOpen=document.getElementById('update-exists-contact');modalOpen.style.display='block'}if(response.status===true){modal.style.display='none';location.reload()}},error:function(xhr,status,error){if(xhr.status===400){alert("Bad request: "+xhr.responseText)}else if(xhr.status===404){alert("Resource not found")}else{alert("An error occurred: "+error)}}})});var modalClose=document.querySelectorAll('.close-modal-existe');var exModal=document.getElementById('exists-contact');var upexModal=document.getElementById('update-exists-contact');modalClose.forEach(button=>{button.addEventListener('click',()=>{exModal.style.display='none';upexModal.style.display='none'})});