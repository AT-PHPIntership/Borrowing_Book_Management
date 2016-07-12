<!-- Footer -->
<footer>
    <div class="splitter"></div>
    <ul>
        <!-- three footer columns are here -->
    </ul>

    <div class="bar">
        <div class="bar-wrap">
            <ul class="links"> <!-- footer menu -->
                <li>
                    <a href="#" title="Home">Home</a>
                </li>
                @if(Auth::check())
                <li>
                    <a href="#" title="BorrowList" >Borrow List</a>
                </li>
                <li>
                    <a href="#" title="Profile">Profile</a>
                </li>
                @endif
                <li>
                    <a href="#" title="Contac">Contact</a>
                </li>
            </ul>

            <div class="social">
                <a href=""><img src="{{ url('backend/images/face.jpg') }}" width="20px" height="20px"></a>
                <a href=""><img src="{{ url('backend/images/gg.jpg') }}" width="20px" height="20px"></a>
            </div>
            <div class="copyright" align="right">Copyright &copy; Your Website 2016</div>
        </div>
    </div>
</footer>