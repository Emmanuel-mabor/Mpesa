from flask import Flask, render_template, request, jsonify
import random

app = Flask(__name__)

# Sample C programming challenges
challenges = [
    {
        'question': 'Write a C program to print "Hello, World!".',
        'solution': '#include <stdio.h>\nint main() {\n    printf("Hello, World!");\n    return 0;\n}'
    },
    {
        'question': 'Write a C program to add two numbers.',
        'solution': '#include <stdio.h>\nint main() {\n    int a, b;\n    scanf("%d %d", &a, &b);\n    printf("%d", a + b);\n    return 0;\n}'
    }
]

@app.route('/')
def index():
    challenge = random.choice(challenges)
    return render_template('index.html', challenge=challenge)

@app.route('/check_solution', methods=['POST'])
def check_solution():
    user_code = request.form['code']
    solution = request.form['solution']
    if user_code.strip() == solution.strip():
        return jsonify({'result': 'Correct!'})
    else:
        return jsonify({'result': 'Incorrect. Try again.'})

if __name__ == '__main__':
    app.run(debug=True)
