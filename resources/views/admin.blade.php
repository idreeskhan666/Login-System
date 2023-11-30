<x-app-layout>
    <div>
       <center> <h1 style="background-color:aquamarine">
            Admin dashboard
        </h1></center>
    </div>
    <div>
        <center>
        <form action="{{ url('/addvendor') }}" method="POST">
            @csrf
            <br>
             <div>
            <label>Name :</label>
            <input type="text" name="name" required placeholder="Enter your name">
             </div>
             <br>
             <div>
            <label>Email :</label>
            <input type="email" name="email" required placeholder="Enter your email">
            </div>
            <br>
            <div>
            <label>Password :</label>
            <input type="password" name="password" required placeholder="Enter your Password">
            </div>
            <br>
            <div>
               <button type="submit">Submit</button>
            </div>
        </form>
        </center>
    </div>

    </x-app-layout>
