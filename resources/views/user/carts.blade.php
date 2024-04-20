@extends('user.layout')
@section('content')
<style>
    /* Popup container */
    .popup {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        padding-top: 60px;
    }

    /* Popup content */
    .popup-content {
        background-color: #fefefe;
        margin: 5% auto; /* 5% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 50%; /* Could be more or less, depending on screen size */
    }

    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
    img{  
    height: 60px;
    width: 60px;
    }
</style>


    @include('errors.error')
    <section id="cart" class="section-p1" style="padding:140px">
    <table width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>category</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>price</th>
                <th>total Price</th>
                <th>Remove</th>
                <th>Edit</th>
            </tr>
        </thead>

        <tbody>
        
    <?php 
    if(!empty($carts)){
    foreach($carts as $key=>$cart ){ 
        ?>
            <tr>
                <td>{{$key+1}}</td>
                <td><img src="{{asset("storage/{$cart->product->image}")}}" alt="product"></td>
                <td>{{$cart->product->category->name}}</td>
                <td>{{$cart->product->name}}</td>
                <td>{{$cart->quantity}}</td>
                <td>{{$cart->product->price}}</td>
                <td>{{$cart->quantity*$cart->product->price }}</td>
                <td> 
                    <form action="{{url("deleteCart/$cart->id")}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="confirm('Are you sure to delete')">Delete</button>
                    </form>
                <td><button class="btn btn-success" onclick="openPopup()">EDIT</button></td>
                <div id="myPopup" class="popup">
                <div class="popup-content">
                    <span class="close" onclick="closePopup()">&times;</span>
                    <h3>Popup Form</h3>
                    <form action="{{url("editCart/$cart->id")}}" method="post">
                        @csrf
                    <img src="{{asset("storage/{$cart->product->image}")}}" alt="p1">
                    <label for="quantity">Quantity:</label><br>
                    <input type="number" max="{{($cart->product->quantity-($cart->product->quantity_reserved-$cart->quantity))}}" name="quantity" value="{{$cart->quantity}}"><br>
                    <input type="submit" name="submit" value="Submit">
                    </form>
                </div>
                </div>
            
            </tr>
            <?php }} ?>
        </tbody>
        <!-- confirm order  -->
        {{-- <td><a href="confirmOrder.php" name="" class="btn btn-success">Confirm</a></td> --}}
        
    </table>
    {{$carts->links()}}
</section>
<script>
// Function to open the popup
function openPopup() {
    document.getElementById("myPopup").style.display = "block";
}

// Function to close the popup
function closePopup() {
    document.getElementById("myPopup").style.display = "none";
}
</script>
@endsection