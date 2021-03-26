### Default Operation Permissions

- List - melihat semua data dari database model, filter, cari, paginasi halaman
- Create - tambah data entri
- Update - edit data entri
- Show - show data entri
- Delete - hapus data entri
- BulkDelete - hapus beberapa data entri sekaligus
- Clone - copy data entri
- BulkClone - copy beberapa data entri
- Reorder - reorder data entr

### Handle access operations

``` bash

$this->crud->allowAccess('operation_name'); // create, list, update, delete, show etc
$this->crud->allowAccess(['list', 'update', 'delete']);
$this->crud->denyAccess('operation');
$this->crud->denyAccess(['update', 'create', 'delete']);

$this->crud->hasAccess('operation_name'); // returns true/false
$this->crud->hasAccessOrFail('create'); // throws 403 error
$this->crud->hasAccessToAll(['create', 'update']); // returns true/false
$this->crud->hasAccessToAny(['create', 'update']); // returns true/false

```

### Default access
- create
- list
- update
- delete
- show