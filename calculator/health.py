from django.http import JsonResponse
from django.views import View
import socket

class HealthCheckView(View):
    def get(self, request):
        return JsonResponse({
            'status': 'healthy',
            'instance': socket.gethostname(),
            'service': 'django-calculator'
        })
