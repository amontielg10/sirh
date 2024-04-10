<html>
 <head>
        <style>
                #toggle {
  display: none;
}

label {
  display: inline-block;;
  width: 40px;
  height: 20px;
  background-color: #ccc;
  border-radius: 10px;
  position: relative;
  cursor: pointer;
  margin-left: 32px;
}

label::before {
  content: "";
  position: absolute;
  top: 2px;
  left: 2px;
  width: 16px;
  height: 16px;
  background-color: white;
  border-radius: 50%;
  transition: transform 0.3s;
}

#toggle:checked + label {
  background-color: #2196F3;
}

#toggle:checked + label::before {
  transform: translateX(20px);
}
        </style>
 </head>
<body>
   <span>Toggle Switch </span>
   <input type="checkbox" id="toggle" />
   <label for="toggle"></label>
</body>
</html>