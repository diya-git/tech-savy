body {
  margin: 0;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background: linear-gradient(45deg, #ff9a9e, #fad0c4, #fbc2eb, #a1c4fd, #0d5576);
  background-size: 300% 300%;
  animation: gradientAnimation 8s ease infinite;
}

@keyframes gradientAnimation {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}

form {
  background: white;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  width: 400px;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}

input, select, textarea, button {
  width: 100%;
  margin-bottom: 15px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button {
  padding: 15px 30px;
  color: white;
  font-weight: bold;
  border-radius: 5%;
  cursor: pointer;
  font-size: 16px;
  transition: font-size 0.3s ease, background-color 0.3s ease;
}

button:hover {
  border-color: black; 
  font-size: 24px;
}

.radio-group {
  margin-top: 10px;
}

.radio-item {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
}

.radio-item label {
  margin-left: 5px;
}
