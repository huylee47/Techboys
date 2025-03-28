<?php
namespace App\Service;
use App\Models\Attributes;
use App\Models\AttributesValue;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\DB;

class AttributesService{
    public function index()
    {
        $attributes = Attributes::with('values')->get();
    
        $usedValues = ProductVariant::pluck('attribute_values')->toArray();
        $usedValuesArray = [];
    
        foreach ($usedValues as $json) {
            $decoded = json_decode($json, true);
            if ($decoded) {
                foreach ($decoded as $key => $value) {
                    $usedValuesArray[] = $value;
                }
            }
        }
    
        return view('admin.attributes.index', compact('attributes', 'usedValuesArray'));
    }
    public function store( $request)
    {
        DB::beginTransaction(); // Bắt đầu transaction
    
        try {
            $attribute = Attributes::create([
                'name' => $request->name,
                'is_multiple' => $request->is_multiple,
            ]);
    
            if (!empty($request->values)) {
                foreach ($request->values as $value) {
                    AttributesValue::create([
                        'attributes_id' => $attribute->id,
                        'value' => $value
                    ]);
                }
            }
    
            DB::commit();
    
            return redirect()->route('admin.attributes.index')->with('success', 'Thuộc tính và các giá trị đã được thêm thành công!');
        
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.attributes.create')->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $attribute = Attributes::findOrFail($id);
        $values = AttributesValue::where('attributes_id', $id)->pluck('value', 'id');
    
        $usedValues = ProductVariant::pluck('attribute_values')->toArray();
        $usedValuesArray = [];
    
        foreach ($usedValues as $json) {
            $decoded = json_decode($json, true);
            if ($decoded) {
                foreach ($decoded as $key => $value) {
                    $usedValuesArray[] = $value; 
                }
            }
        }
    
        return view('admin.attributes.edit', compact('attribute', 'values', 'usedValuesArray'));
    }
    public function update($request){
        DB::beginTransaction();
        try{
            $attribute = Attributes::findOrFail($request->id);
            $attribute->update([
                'name' => $request->name,
                'is_multiple' => $request->is_multiple,
            ]);
            AttributesValue::where('attributes_id', $request->id)->delete();
            if (!empty($request->values)) {
                foreach ($request->values as $value) {
                    AttributesValue::create([
                        'attributes_id' => $attribute->id,
                        'value' => $value
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('admin.attributes.index')->with('success', 'Thuộc tính và các giá trị đã được cập nhật thành công!');
        }
        catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.attributes.edit', $request->id)->with('error', 'Có lỗi xảy ra: '. $e->getMessage());
        }
    }
    public function destroy($id){
        DB::beginTransaction();
        try{
            $attribute = Attributes::find($id);
            $attribute->delete();
            AttributesValue::where('attributes_id', $id)->delete();
            DB::commit();
            return redirect()->route('admin.attributes.index')->with('success', 'Thuộc tính và các giá trị đã được xoá thành công!');
        }
        catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.attributes.index')->with('error', 'Có lỗii xảy ra: '. $e->getMessage());
        }
    }
}