<?php
namespace App\Http\Livewire\Admin;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminManageProductComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $deleteId = '';
    public $search;
    public $pageSize = 8;

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        $product = Product::find($this->deleteId);
        unlink('frontend/assets/images/product/' . $product->image);
        foreach (json_decode($product->images) as $file) {
            unlink('frontend/assets/images/product/' . $file);
        }
        $product->delete();
        noty()->closeWith(['click', 'button'])->addInfo('Product has been deleted successfully');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function changePageSize($size)
    {
        $this->pageSize = $size;
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        /*$products = Product::where('name', 'LIKE', $search)
            ->orWhere('sku_code', 'LIKE', $search)
            ->orWhere('short_description', 'LIKE', $search)
            ->orderBy('created_at', 'desc')->paginate($this->pageSize);*/


       $products=Product::where(function ($query) use ($search){
         $query->where('name','LIKE',$search)
         ->orWhere('sku_code', 'LIKE', $search)
             ->orWhere('short_description', 'LIKE', $search);
         })
           ->orWhereHas('category',function ($query) use($search){
               $query->where('name','LIKE',$search);
           })
          ->orWhereHas('brand',function ($query) use($search){
              $query->where('name','LIKE',$search);
          })
           ->paginate($this->pageSize);

        return view('livewire.admin.admin-manage-product-component', ['products' => $products]);
    }
}
