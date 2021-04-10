@extends('layouts.auth')
@section('content')

<div class="container">
	- get thong tin từ category
	- đăng ký thông tin
    - user 2 xác nhận
    - đăng bán 
    - người dùng mua hàng 


<section class="content-header">
    <h1>
        Danh sách sản phẩm
    </h1>
</section>
<section class="content">
	<div class="box box-primary">
        <div class="box-header"> 
            <div class="col-sm-12">
                 <a class="btn btn-success" href="{{ $addUrl }}">
                        <i class="fa fa-plus"></i> Thêm mới
                 </a>
            </div>
        </div>

         <div class="box-body">
         </div>

        <div class="box-body table-responsive-custom">
            <table id="table">
                <tr>
                    <td align="center" style="width: 5%"><strong>STT</strong></td>
                    <td align="left" style="width: 10%"><strong>Icon</strong></td>
                    <td align="left" style="width: 15%"><strong>Tên</strong></td>
                    <td align="" style="width: 15%"><strong>Nhóm</strong></td>
                    <td align="" style="width: 15%"><strong>Loại giao dịch</strong></td>
                    <td align="" style="width: 15%"><strong>Nhà cung cấp</strong></td>
                    <td align="" style="width: 10%"><strong>Số tiền</strong></td>
                    <td align="center" style="width: 10%"><strong>Trạng thái</strong></td>
                    <td align="left" style="width: 5%"></td>
                </tr>
                <!-- @foreach($product as $key => $product)
                    <tr>
                        <td class="" align="center">{{ $models->firstItem() + $key }}</td>
                        <td class="text-center">
                            @if ($model->str_icon != '')
                                <img id="logo-img" src="{{ Image::getImageUrl($model->str_icon) }}" class="mobile-logo-image" />
                            @endif
                        </td>
                        <td class="">{{ $model->str_inv_type }}</td>
                        <td class="">{{ $model->invTypeGroup ? $model->invTypeGroup->str_inv_type_group : '' }}</td>
                        <td class="">{{ $model->useCase ? $model->useCase->str_use_case : '' }}</td>
                        <td class="">
                            {{ $model->issuer && $model->issuer->parent ? $model->issuer->parent->str_display_name : '' }}
                            -
                            {{ $model->issuer ? $model->issuer->str_display_name : '' }}
                        </td>
                        <td align="">@decimal($model->amnt_amount)</td>
                        <td class="text-center">@status($model->bol_is_active ? config('config.status.active') : config('config.status.inactive'))</td>
                        <td class="text-center">
                            
                            @include('partials.row_dropdown_actions',
                                ['actionLinks' => [
                                        
                                        'view_url' => [
                                                'name' => 'view-link',
                                                'title' => trans('global.view'),
                                                'url' => $viewUrl . '/' . $model->id_inv_type,
                                                'class' => 'fa fa-search',
                                                ],
                                        'edit_url' => [
                                                'name' => 'edit-link',
                                                'title' => trans('global.edit'),
                                                'url' => $editUrl . '/' . $model->id_inv_type,
                                                'class' => 'fa fa-edit',
                                                ],
                                        'delete_url' => [
                                               'name' => 'delete',
                                               'title' => trans('global.delete'),
                                               'url' => url($deleteUrl . '/' . $model->id_inv_type),
                                               'class' => 'fa fa-delete'
                                               ],
                                     ],

                                ])
                                
                        </td>
                    </tr>
                @endforeach -->

            </table>
        </div>

        <div class="box-footer clearfix">
        </div>

    </div>
</section>
</div>
@endsection

@section('script')


<script type="text/javascript">
</script>