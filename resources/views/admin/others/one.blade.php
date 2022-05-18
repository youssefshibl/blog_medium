@extends('admin.others.assembly')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif

<div class="tags-section" style="padding: 10px;background: white;border-radius: 15px;">
    <div class="box-add-tag" style="margin-top: 30px;display: flex;align-items: center;">
        <h3 style="margin-left: 20px;margin-right: 30px;color: #496edb;">Add Tag</h3>
        <div class="box-input-tag">
            <form action="{{ route('admin.others.tags.add') }}" method="POST">
                @csrf
                <input type="text" name="tag_name" placeholder="Tag name" style="height: 40px;padding: 5px 10px;width: 300px;border-radius: 5px;border: 1px solid #0000003d;">
                <button type="submit" style="background: #e74a3b;color: white;border: none;padding: 5px 32px;margin-left: 20px;border-radius: 4px;accent-color: ;">Add</button>
            </form>
        </div>
    </div>
    <div class="all-tags" style="margin: 15px;padding: 15px;display: flex;flex-wrap: wrap;">
        @foreach ($tags as $tag)
        <div class="tag-box" style="padding: 5px 12px;background: #f3f4f7;border-radius: 8px;margin: 5px;height: fit-content;">{{ $tag->name}}</div>
        @endforeach
    </div>
</div>



@endsection

@section('script')
<script>
            document.querySelector('.Utilities-me').classList.add('active');
            document.querySelector('.Utilities-me-user').classList.add('collapsed');
            document.querySelector('.Utilities-me-show').classList.add('show');
            document.querySelector('.others-me').classList.add('active');
    </script>
@endsection
