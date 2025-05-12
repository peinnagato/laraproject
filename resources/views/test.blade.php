@php
    $user = "Raj Tamang";
    $fruits = ["Apple","Mango","Banana"];
    
@endphp
{{-- {{$user}} --}}

<script>
    var data = @json($fruits);
    alert(data);
</script>