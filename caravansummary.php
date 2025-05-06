<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Caravan Summary</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-image: url('https://s-media-cache-ak0.pinimg.com/736x/51/a2/0b/51a20b40312986fa94cf8764607cd3aa.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      color: white;
    }

    .section-title {
      font-size: 2rem;
      text-align: center;
      margin-top: 20px;
      color: white;
      text-shadow: 2px 2px 4px #000000;
    }

    .caravan-section {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      padding: 30px;
    }

    .caravan-card {
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      margin: 15px;
      width: 280px;
      cursor: pointer;
      box-shadow: 0 4px 8px rgba(0,0,0,0.3);
      transition: transform 0.3s ease;
    }

    .caravan-card:hover {
      transform: scale(1.03);
    }

    .caravan-card img {
      width: 100%;
      height: 180px;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }

    .caravan-card .caption {
      padding: 15px;
      color: #333;
      font-weight: bold;
      text-align: center;
      font-size: 1.2rem;
    }

    /* Modal styles */
    .modal {
      display: none;
      position: fixed;
      z-index: 10;
      left: 0; top: 0;
      width: 100%; height: 100%;
      background-color: rgba(0,0,0,0.7);
      justify-content: center;
      align-items: center;
    }

    .modal-content {
      background: linear-gradient(135deg, #ff7e5f, #feb47b);
      padding: 25px;
      border-radius: 15px;
      width: 60%;
      max-width: 600px;
      color: #fff;
      text-align: left;
      box-shadow: 0 0 20px rgba(0,0,0,0.3);
      max-height: 80%;
      overflow-y: auto;
      font-family: 'Arial', sans-serif;
    }

    .modal-content img {
      width: 100%;
      height: auto;
      border-radius: 15px;
      margin-bottom: 20px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .modal-content h3 {
      font-size: 2rem;
      color: #fff;
      margin-bottom: 20px;
      font-weight: bold;
      text-shadow: 2px 2px 5px rgba(0,0,0,0.5);
    }

    .modal-content p {
      font-size: 1.1rem;
      line-height: 1.6;
      color: #fff;
      margin-bottom: 20px;
    }

    .modal-content .price {
      font-size: 1.5rem;
      color: #f1c40f;
      font-weight: bold;
      margin-bottom: 20px;
      text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    }

    .modal-content .cancel-btn {
      background-color: #f1c40f;
      color: white;
      padding: 12px 30px;
      border-radius: 5px;
      text-align: center;
      cursor: pointer;
      display: inline-block;
      margin: 10px 0;
      font-size: 16px;
      border: none;
      transition: background-color 0.3s ease;
    }

    .modal-content .cancel-btn:hover {
      background-color: #e67e22;
    }

    .close-btn {
      font-size: 28px;
      font-weight: bold;
      color: #aaa;
      cursor: pointer;
    }

    .close-btn:hover {
      color: red;
    }

  </style>
</head>
<body>

  <div class="caravan-section" id="caravan-section">
    <!-- Caravan Cards will be injected here -->
  </div>

  <!-- Modal for Caravan Details -->
  <div id="caravanModal" class="modal">
    <div class="modal-content">
      <span class="close-btn" onclick="closeModal()">&times;</span>
      <button class="cancel-btn" onclick="closeModal()">Close</button>
      <h3 id="modal-title"></h3>
      <img id="modal-img" src="" alt="">
      <p id="modal-desc"></p>
      <p id="modal-price" class="price"></p>
    </div>
  </div>

  <script>
    const caravans = [
      {
        title: "Devon Classic Caravan",
        img: "https://th.bing.com/th/id/OIP.v17sBrkEcxr9ekS822bHJwHaFb?rs=1&pid=ImgDetMain",
        desc: "Location: 🌍 Devon\nPrice: 💷 £45/night\nSleeps: 🛏️ 4 members\nSpeciality: Pet-friendly and eco-built.\n\nThis traditional Devon Classic Caravan is ideal for those seeking a cozy getaway. With comfortable sleeping arrangements for up to 4 members, it offers a homely experience for families or small groups. Located in the picturesque Devon countryside, it boasts beautiful natural surroundings and is close to popular outdoor attractions. The caravan is pet-friendly, making it a great option for animal lovers who wish to bring their furry friends along. Eco-conscious travelers will also appreciate the sustainable design of this caravan.",
        price: "£45/night"
      },
      {
        title: "Beachside Mobile Home",
        img: "https://th.bing.com/th/id/OIP.RsWPiGfztuRGLKXqbM1vngHaE8?w=1024&h=683&rs=1&pid=ImgDetMain",
        desc: "Location: 🌍 Brighton\nPrice: 💷 £55/night\nSleeps: 🛏️ 3 members\nSpeciality: Walking distance to beach.\n\nExperience the charm of coastal living with the Beachside Mobile Home. Perfectly situated in the vibrant Brighton area, this caravan is just a short stroll away from the beach. It provides accommodation for up to 3 people, making it perfect for a small group or couple looking for a peaceful retreat by the sea. The modern interiors, coupled with the convenience of being near Brighton's lively attractions, make this mobile home a wonderful vacation choice. Spend your days on the beach and your nights in comfort.",
        price: "£55/night"
      },
      {
        title: "Seaside Caravan",
        img: "https://th.bing.com/th/id/OIP.v17sBrkEcxr9ekS822bHJwHaFb?rs=1&pid=ImgDetMain",
        desc: "Location: 🌍 Cornwall\nPrice: 💷 £60/night\nSleeps: 🛏️ 5 members\nSpeciality: Seaside view, family-friendly.\n\nSituated in the stunning coastal region of Cornwall, the Seaside Caravan is a great option for families looking to enjoy the beach. Accommodating up to 5 people, this caravan offers ample space for a family or small group. With its prime location near the sea, you can enjoy picturesque views right from the comfort of the caravan. The surrounding area offers a wide variety of outdoor activities, including hiking, fishing, and surfing. The Seaside Caravan is ideal for a family vacation filled with fun and relaxation.",
        price: "£60/night"
      },
      {
        title: "Mountain View Caravan",
        img: "https://th.bing.com/th/id/OIP.t-hYWvT6PZnAuVqwj-irKgHaE6?w=1700&h=1129&rs=1&pid=ImgDetMain",
        desc: "Location: 🌍 Snowdonia\nPrice: 💷 £70/night\nSleeps: 🛏️ 4 members\nSpeciality: Amazing mountain views.\n\nFor those who love nature and adventure, the Mountain View Caravan in Snowdonia is a perfect escape. This spacious caravan accommodates up to 4 people and offers breathtaking views of the surrounding mountains. Whether you're into hiking, mountain biking, or simply soaking in the scenery, this location provides it all. The caravan itself is well-equipped with all the comforts of home, making it a relaxing base after a day of exploring the Welsh mountains. Perfect for outdoor enthusiasts and nature lovers.",
        price: "£70/night"
      },
      {
        title: "Luxury Swift Elegance",
        img: "https://www.practicalcaravan.com/wp-content/uploads/2018/08/7901075-scaled.jpg",
        desc: "Location: 🌍 Yorkshire\nPrice: 💷 £110/night\nSleeps: 🛏️ 6 members\nSpeciality: Built-in entertainment and modern kitchen.\n\nThe Luxury Swift Elegance offers the ultimate in comfort and style. Perfect for larger families, it can sleep up to 6 people comfortably. Located in beautiful Yorkshire, this caravan features a state-of-the-art kitchen, a spacious living area, and high-end entertainment options. Whether you're enjoying a family movie night or cooking a gourmet meal, this caravan has it all. Its modern design and sleek interiors make it a perfect choice for those seeking a luxurious and convenient getaway in the countryside.",
        price: "£110/night"
      },
      {
        title: "Deluxe Touring Caravan",
        img: "https://th.bing.com/th/id/OIP.RZa_7rohsbwm4L-sFraOGAHaE8?rs=1&pid=ImgDetMain",
        desc: "Location: 🌍 Norfolk\nPrice: 💷 £95/night\nSleeps: 🛏️ 5 members\nSpeciality: Dual-bedrooms and family setup.\n\nThe Deluxe Touring Caravan offers a spacious and comfortable environment, making it perfect for families or groups. With dual-bedrooms, this caravan accommodates up to 5 people, providing ample room for relaxation and privacy. Located in Norfolk, it offers easy access to both the beach and countryside, making it ideal for those who want to experience both coastal and rural beauty. Equipped with all modern amenities, including a fully-equipped kitchen, this caravan ensures that your stay is both comfortable and convenient.",
        price: "£95/night"
      },
      {
        title: "Luxury Holiday Caravan",
        img: "https://th.bing.com/th/id/OIP.RsWPiGfztuRGLKXqbM1vngHaE8?w=1024&h=683&rs=1&pid=ImgDetMain",
        desc: "Location: 🌍 Isle of Wight\nPrice: 💷 £120/night\nSleeps: 🛏️ 6 members\nSpeciality: Perfect for larger families.\n\nThe Luxury Holiday Caravan on the Isle of Wight offers a premium experience for families looking for a peaceful getaway. With space for up to 6 people, this caravan is ideal for large families or groups. Its proximity to the beach and local attractions makes it the perfect base for exploring the island. Enjoy the comforts of home with modern furnishings, a fully-equipped kitchen, and spacious living areas. The caravan also offers fantastic views of the coastline and is a perfect choice for a relaxed family vacation.",
        price: "£120/night"
      },
      {
        title: "Executive Caravan",
        img: "https://th.bing.com/th/id/OIP.RZa_7rohsbwm4L-sFraOGAHaE8?rs=1&pid=ImgDetMain",
        desc: "Location: 🌍 Scotland\nPrice: 💷 £130/night\nSleeps: 🛏️ 7 members\nSpeciality: Premium features and comfort.\n\nThe Executive Caravan is an ultra-modern and luxurious accommodation designed for large families or groups. It offers plenty of space with sleeping arrangements for up to 7 people, making it an excellent choice for larger parties. This caravan is fully equipped with high-end appliances, comfortable seating, and top-notch entertainment options. Located in the beautiful Scottish Highlands, you'll be surrounded by breathtaking natural scenery, providing an unforgettable vacation experience.",
        price: "£130/night"
      }
    ];

    const section = document.getElementById('caravan-section');

    caravans.forEach(caravan => {
      const card = document.createElement('div');
      card.classList.add('caravan-card');
      card.innerHTML = `
        <img src="${caravan.img}" alt="Caravan Image">
        <div class="caption">${caravan.title}</div>
      `;
      card.addEventListener('click', () => openModal(caravan));
      section.appendChild(card);
    });

    function openModal(caravan) {
      document.getElementById('modal-title').innerText = caravan.title;
      document.getElementById('modal-img').src = caravan.img;
      document.getElementById('modal-desc').innerText = caravan.desc;
      document.getElementById('modal-price').innerText = caravan.price;
      document.getElementById('caravanModal').style.display = 'flex';
    }

    function closeModal() {
      document.getElementById('caravanModal').style.display = 'none';
    }
  </script>
</body>
</html>