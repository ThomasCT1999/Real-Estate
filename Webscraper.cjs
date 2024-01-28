const { Builder, By, until } = require('selenium-webdriver');
const chrome = require('selenium-webdriver/chrome');

async function scrapeWebsite() {
    // Set up Selenium WebDriver in headless mode
    const driver = await new Builder()
        .forBrowser('chrome')
        .setChromeOptions(new chrome.Options().addArguments('--headless'))
        .build();

    try {
        // Navigate to the Rightmove website
        await driver.get('https://www.rightmove.co.uk/property-for-sale/find.html?searchType=SALE&locationIdentifier=POSTCODE%5E4448235&insId=1&radius=0.0&minPrice=&maxPrice=&minBedrooms=&maxBedrooms=&displayPropertyType=&maxDaysSinceAdded=&_includeSSTC=on&sortByPriceDescending=&primaryDisplayPropertyType=&secondaryDisplayPropertyType=&oldDisplayPropertyType=&oldPrimaryDisplayPropertyType=&newHome=&auction=false');

        // Wait for a specific element to be present (adjust the selector as needed)
        await driver.wait(until.elementLocated(By.className('l-searchResult is-list')), 10000);

        // Find all elements matching the specified selector
        const elements = await driver.findElements(By.className('l-searchResult is-list'));

        // Iterate through each element and process the scraped data
        for (const specificElement of elements) {
            const scrapedData = await specificElement.getText();

            // Process the scraped data to extract specific information
            const lines = scrapedData.split('\n');
            const price = lines[1].trim(); // Extracting the second line as the price
            const offerType = lines[2].trim(); // Extracting the third line as the offer type
            const address = lines[3].trim(); // Extracting the fourth line as the address
            const propertyType = lines[4].trim(); // Extracting the fifth line as the property type

            // Print the extracted information for each element
            console.log('Price:', price);
            console.log('Offer Type:', offerType);
            console.log('Address:', address);
            console.log('Property Type:', propertyType);
            console.log('---'); // Separator between elements
        }
    } finally {
        // Close the browser window
        await driver.quit();
    }
}

// Run the scrape function
scrapeWebsite();
