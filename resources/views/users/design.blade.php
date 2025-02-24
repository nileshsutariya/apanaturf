<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bidding Leaderboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .leaderboard {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .top-bids {
            margin-bottom: 20px; /* Space below the top bids */
        }

        .bids-container {
            max-height: 200px; /* Set a maximum height for scrolling */
            overflow-y: auto; /* Enable vertical scrolling */
            scrollbar-width: none; /* For Firefox */
        }

        .bids-container::-webkit-scrollbar {
            display: none; /* For Chrome, Safari, and Opera */
        }

        .bid-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 10px;
            border: 2px solid #ddd;
            transition: transform 0.3s;
            background: white;
        }

        .bid-card img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .highlight {
            border-color: #4CAF50;
            transform: scale(1.1);
            font-weight: bold;
            background: #f1fdf3;
        }

        .second {
            transform: scale(1.05);
            font-weight: bold;
        }

        .third {
            transform: scale(1.02);
            font-weight: bold;
        }

        .faded {
            opacity: 0.5;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="leaderboard">
            <h3 class="text-center">Bidding Leaderboard</h3>
            <div class="top-bids" id="top-bids-list">
                <!-- Top bids will be placed here dynamically -->
            </div>
            <div class="bids-container" id="bids-list">
            <div class="bid" data-name="Devon Lane" data-amount="600" data-img="https://via.placeholder.com/40"></div>
                <div class="bid" data-name="Alice Smith" data-amount="550" data-img="https://via.placeholder.com/40"></div>
                <div class="bid" data-name="Bob Johnson" data-amount="500" data-img="https://via.placeholder.com/40"></div>
                <div class="bid" data-name="Charlie Brown" data-amount="3768" data-img="https://via.placeholder.com/40"></div>
                <div class="bid" data-name="Charlie Brown" data-amount="3268" data-img="https://via.placeholder.com/40"></div>
                <div class="bid" data-name="Charlie Brown" data-amount="3868" data-img="https://via.placeholder.com/40"></div>
                <div class="bid" data-name="Charlie Brown" data-amount="3168" data-img="https://via.placeholder.com/40"></div>
                <div class="bid" data-name="Charlie Brown" data-amount="3798" data-img="https://via.placeholder.com/40"></div>
                <div class="bid" data-name="Charlie Brown" data-amount="3368" data-img="https://via.placeholder.com/40"></div>
                <div class="bid" data-name="Charlie Brown" data-amount="7768" data-img="https://via.placeholder.com/40"></div>
                <div class="bid" data-name="Diana Prince" data-amount="6768" data-img="https://via.placeholder.com/40"></div>
                <div class="bid" data-name="Eve Adams" data-amount="200" data-img="https://via.placeholder.com/40"></div>
                <div class="bid" data-name="Eve Adams" data-amount="200" data-img="https://via.placeholder.com/40"></div>
                <div class="bid" data-name="Eve Adams" data-amount="200" data-img="https://via.placeholder.com/40"></div>
                <div class="bid" data-name="Eve Adams" data-amount="200" data-img="https://via.placeholder.com/40"></div>
                <div class="bid" data-name="Eve Adams" data-amount="200" data-img="https://via.placeholder.com/40"></div>
                <div class="bid" data-name="Eve Adams" data-amount="200" data-img="https://via.placeholder.com/40"></div>
                <div class="bid" data-name="Eve Adams" data-amount="200" data-img="https://via.placeholder.com/40"></div>
                <div class="bid" data-name="Eve Adams" data-amount="200" data-img="https://via.placeholder.com/40"></div>
            </div>
        </div>
    </div>

    <script>
        function getBidsFromHTML() {
            const bidElements = document.querySelectorAll(".bid");
            let bids = [];

            bidElements.forEach((el) => {
                let name = el.getAttribute("data-name");
                let amount = parseInt(el.getAttribute("data-amount"));
                let img = el.getAttribute("data-img");

                bids.push({ name, amount, img });
            });

            return bids;
        }

        function renderBids() {
            let bids = getBidsFromHTML();

            // Sort bids in descending order
            bids.sort((a, b) => b.amount - a.amount);

            const topBidsList = document.getElementById("top-bids-list");
            const bidsList = document.getElementById("bids-list");

            // Clear previous content
            topBidsList.innerHTML = "";
            bidsList.innerHTML = "";

            // Render top 5 bids
            bids.slice(0, 5).forEach((bid, index) => {
                const div = document.createElement("div");
                div.className = "bid-card";

                // Apply different classes based on rank
                if (index === 0) {
                    div.classList.add('highlight'); // First place
                } else if (index === 1) {
                    div.classList.add('second'); // Second place
                } else if (index === 2) {
                    div.classList.add('third'); // Third place
                }

                div.innerHTML = `
                    <span>#${index + 1} <img src="${bid.img}" alt="Avatar"> ${bid.name}</span>
                    <span>${bid.amount}</span>
                `;

                topBidsList.appendChild(div);
            });

            bids.slice(5).forEach((bid, index) => {
                const div = document.createElement("div");
                div.className = "bid-card faded"; // Faded for lower ranks

                div.innerHTML = `
                    <span>#${index + 6} <img src="${bid.img}" alt="Avatar"> ${bid.name}</span>
                    <span>${bid.amount}</span>
                `;

                bidsList.appendChild(div);
            });
        }

        renderBids();
    </script>
</body>

</html>