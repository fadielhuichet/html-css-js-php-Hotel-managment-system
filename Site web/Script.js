(async function initHotelSearch() {
    let hotelData;

    try {
        const response = await fetch("../data/hotels.json");
        if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
        hotelData = await response.json();
        console.log('Data:', hotelData);

        const destinations = hotelData.destinations;

        // Populate the destination datalist
        document.querySelector("#search").innerHTML = `
            <datalist id="hotel-list">
                ${destinations.map(destination => `<option value="${destination.name}">`).join('')}
            </datalist>
        `;
        document.querySelector('#destination-input').setAttribute('list', 'hotel-list');

        // Get all hotels and sort by rating
        const allHotels = [];
        destinations.forEach(destination => {
            destination.hotels.forEach(hotel => {
                allHotels.push({
                    name: hotel.name,
                    rating: parseFloat(hotel.rating), // Convert rating to a number
                    image: hotel.image,
                    address: hotel.address,
                    price: hotel.price
                });
            });
        });

        // Sort hotels by rating in descending order and take the top 3
        const topRatedHotels = allHotels.sort((a, b) => b.rating - a.rating).slice(0, 3);

        // Populate the "The Most Rating Hotels" section
        const mostRatedHotelsContainer = document.getElementById('most-rated-hotels');
        mostRatedHotelsContainer.innerHTML = topRatedHotels.map(hotel => `
            <div class="mItem">
                <img src="${hotel.image}" alt="${hotel.name}"/>
                <h2>${hotel.name}</h2>
                <p>${hotel.address}</p>
                <span>Rating: ${hotel.rating}</span>
                <span>Price: ${hotel.price}</span>
            </div>
        `).join('');

    } catch (error) {
        console.error('Fetch error:', error);
    }

    // Existing form submission logic
    document.getElementById('search-form').addEventListener('submit', function(event) {
        event.preventDefault();

        const destination = document.getElementById('destination-input').value.trim();
        const checkIn = document.getElementById('check-in').value;
        const checkOut = document.getElementById('check-out').value;
        const adults = document.getElementById('adults').value;
        const kids = document.getElementById('kids').value;

        console.log('Form values:', { destination, checkIn, checkOut, adults, kids });

        if (!destination || !checkIn || !checkOut) {
            alert('Please fill in all required fields (Destination, Check-in, Check-out)');
            return;
        }

        const url = `search.php?destination=${encodeURIComponent(destination)}&check_in=${checkIn}&check_out=${checkOut}&adults=${adults}&kids=${kids}`;
        console.log('Opening URL:', url);
        window.open(url, '_blank');
    });

    const bookNowButtons = document.getElementsByClassName("primary-btn");
    const principale = document.getElementsByClassName("principale")[0];
    Array.from(bookNowButtons).forEach(button => {
        button.addEventListener("click", function() {
            principale.scrollIntoView({
                behavior: "smooth",
                block: "center"
            });
        });
    });

    const secondaryBtn = document.getElementsByClassName("secondary-btn")[0];
    const footer = document.getElementsByClassName("footer")[0];
    if (secondaryBtn && footer) {
        secondaryBtn.addEventListener("click", function() {
            footer.scrollIntoView({
                behavior: "smooth"
            });
        });
    }
})();