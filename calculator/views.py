from django.shortcuts import render
from .forms import InputForm
import math

def calculate_view(request):
    result = None
    error = None
    instance_info = "Instance: " + __import__('socket').gethostname()
    
    if request.method == 'POST':
        form = InputForm(request.POST)
        if form.is_valid():
            a = form.cleaned_data['a']
            b = form.cleaned_data['b']
            c = form.cleaned_data['c']
            
            # Input validation
            if not all(isinstance(x, (int, float)) for x in [a, b, c]):
                error = "All values must be numeric."
            elif a < 1:
                error = "Value A is too small (must be >= 1)."
            elif c < 0:
                error = "Value C cannot be negative."
            else:
                # Perform calculations
                if b == 0:
                    b_message = "Note: Value B is 0 and will not affect the result."
                else:
                    b_message = ""
                
                c_cubed = c ** 3
                
                if c_cubed > 1000:
                    intermediate = math.sqrt(c_cubed) * 10
                else:
                    intermediate = math.sqrt(c_cubed) / a
                
                final_result = intermediate + b
                result = f"{final_result:.2f}"
                if b_message:
                    result += f" - {b_message}"
                    
    else:
        form = InputForm()
    
    return render(request, 'calculator/result.html', {
        'form': form,
        'result': result,
        'error': error,
        'instance_info': instance_info
    })
