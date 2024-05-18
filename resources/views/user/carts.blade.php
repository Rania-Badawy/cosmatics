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
                <th>confirmOrder</th>
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
                <?php if($cart->confirmed==0) { ?>
                <td> 
                    <form action="{{url("deleteCart/$cart->id")}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="confirm('Are you sure to delete')">Delete</button>
                    </form>
                </td>
                <?php }else{?><td>Confirmed</td><?php } ?>
                <?php if($cart->confirmed==0) { ?>
                <td><button class="btn btn-primary" onclick="openPopup('{{$cart->id}}')">EDIT</button></td>
                <div id="myPopup-{{$cart->id}}" class="popup">
                <div class="popup-content">
                    <span class="close" onclick="closePopup('{{$cart->id}}')">&times;</span>
                    <h3>Edit Order</h3>
                    <form action="{{url("editCart/$cart->id")}}" method="post">
                        @csrf
                    <img src="{{asset("storage/{$cart->product->image}")}}" alt="p1" style="height: 200px;width: 200px;" >
                    <br><br>
                    <label for="quantity">Quantity:</label>
                    <input type="number" max="{{($cart->product->quantity-($cart->product->quantity_reserved-$cart->quantity))}}" name="quantity" value="{{$cart->quantity}}" >
                    <input type="submit" name="submit" class="btn btn-success" value="Edit" style="float: inline-end;">
                    </form>
                </div>
                </div>
                <?php }else{?><td>Confirmed</td><?php } ?>
                <?php if($cart->confirmed==0) { ?>
                <td><button class="btn btn-success" onclick="openPopupConfirm('{{$cart->id}}')">Confirm</button></td>
                <div id="myPopupConfirm-{{$cart->id}}" class="popup">
                <div class="popup-content">
                    <span class="close" onclick="closePopupConfirm('{{$cart->id}}')">&times;</span>
                    <h3>Confirm Order</h3>
                    <form action="{{url("confirmOrder/$cart->id")}}" method="post">
                        @csrf
                    <img src="{{asset("storage/{$cart->product->image}")}}" alt="p1" style="height: 200px;width: 200px;">
                    <br><br>
                    <label for="quantity">Quantity:</label>
                    <input type="number"   value="{{$cart->quantity}}" disabled>
                    <input type="submit" name="submit" class="btn btn-success" value="Confirm" style="float: inline-end;">
                    </form>
                </div>
                </div>
                <?php }else{?><td>Confirmed</td><?php } ?>
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
function openPopup(cartId) {
    document.getElementById("myPopup-" + cartId).style.display = "block";
}

// Function to close the popup
function closePopup(cartId) {
    document.getElementById("myPopup-" + cartId).style.display = "none";
}
</script>

<script>
    // Function to open the popup
    function openPopupConfirm(cartId) {
        document.getElementById("myPopupConfirm-" + cartId).style.display = "block";
    }
    
    // Function to close the popup
    function closePopupConfirm(cartId) {
        document.getElementById("myPopupConfirm-" + cartId).style.display = "none";
    }
    </script>
@endsection