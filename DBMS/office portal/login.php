<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="login.css" />

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <style>
        * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
#myVideo {
  position: absolute;
  width: 100%;
  height: 100vh;
}
.container {
  width: 100%;
  height: 100vh;
  font-family: sans-serif;
  background-color: rgb(187, 187, 245);
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  background-image: url("background2.jpg");
}
.card {
  width: 350px;
  height: 400px;
  border-radius: 50%;
  box-shadow: 0 0 40px 20px rgba(0, 0, 0, 0.26);
  perspective: 1000px;
}

h2 {
  font-family: "Times New Roman", Times, serif;
  font-size: large;
}

.inner-box {
  position: relative;
  width: 100%;
  height: 100%;
  transition: transform 1s;
  transform-style: preserve-3d;
}
.card-front,
.card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  background-position: center;
  background-size: cover;
  background-image: linear-gradient(
      rgba(19, 98, 245, 0.8),
      rgba(19, 98, 245, 0.8)
    ),
    url("background.jpg");
  padding: 55px;
  box-sizing: border-box;
  backface-visibility: hidden;
  border-radius: 10%;
}
.card-back {
  transform: rotateY(180deg);
}
.card h2 {
  font-weight: normal;
  font-size: 24px;
  text-align: center;
  margin-bottom: 20px;
}
.input-box {
  width: 100%;
  background: transparent;
  border: 1px solid #fff;
  margin: 6px 0;
  height: 32px;
  border-radius: 20px;
  padding: 0 10px;
  box-sizing: border-box;
  outline: none;
  text-align: center;
  color: #fff;
}
::placeholder {
  color: #fff;
  font-size: 12px;
}
button {
  width: 100%;
  background: transparent;
  border: 1px solid #fff;
  margin: 35px 0px 10px;
  height: 32px;
  font-size: 12px;
  border-radius: 20px;
  padding: 0 10px;
  box-sizing: border-box;
  outline: none;
  color: #fff;
  cursor: pointer;
}
.submit-btn {
  position: relative;
}
.submit-btn::after {
  content: "\27a4";
  color: #333;
  line-height: 32px;
  font-size: 17px;
  height: 32px;
  width: 32px;
  border-radius: 50%;
  background: white;
  position: absolute;
  right: -1px;
  top: -1px;
}
span {
  font-size: 13px;
  margin: 10px;
}
.card .btn {
  margin-top: 70px;
}
.card a {
  color: #fff;
  text-decoration: none;
  display: block;
  text-align: center;
  font-size: 13px;
  margin-top: 8px;
}

    </style>
</head>
  <body>
    <video autoplay muted loop id="myVideo">
      <source src="back1.mp4" type="video/mp4" />
    </video>
    <div class="container">
      <div class="card">
        <p id="print"></p>
        <div class="inner-box" id="card">
          <div class="card-front">
            <h2>LOGIN</h2>
            <form action="log.php" method="POST">
              <input
                type="varchar"
                placeholder="Enter the id"
                class="input-box"
                id="s_usn"
                name="s_usn"
                required
              />
              <input
                type="password"
                placeholder="Password"
                class="input-box"
                name="s_password"
                required
              />
              <button
                type="submit"
                class="submit-btn"
                name="bb"
              >
                Submit
              </button>
              <input type="checkbox" /><span>Remember Me</span>
            </form>
            <form action="registration.php">
            </br>
            <h4>New user? </h4>
            <button
                type="submit"
                class="submit-btn"
                name="bbr"
              >Sign Up!
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>