from flask import Flask, jsonify, render_template, request
import requests

app = Flask(__name__)

@app.route('/medicine', methods=['POST'])
def get_medicine_info():
    try:
        # Get the medicine name from the request form data
        name = request.form.get('name')

        # Format the medicine name for the Wikipedia API request
        formatted_name = name.replace(' ', '_')

        # Make a request to the Wikipedia API
        response = requests.get(f"https://en.wikipedia.org/api/rest_v1/page/summary/{formatted_name}")
        data = response.json()

        # Check if the medicine information is available
        if 'title' in data:
            info = {
                'title': data['title'],
                'summary': data['extract'],
                'url': data['content_urls']['desktop']['page']
            }
            return jsonify(info), 200

        # Medicine not found
        return jsonify({'error': 'Medicine not found'}), 404

    except requests.exceptions.RequestException:
        return jsonify({'error': 'Error occurred while fetching medicine information'}), 500

@app.route('/')
def index():
    return render_template('index.html')

if __name__ == '__main__':
    app.run()
