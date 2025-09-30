from django.urls import path
from . import views
from .health import HealthCheckView

urlpatterns = [
    path('', views.calculate_view, name='calculator'),
    path('health/', HealthCheckView.as_view(), name='health'),
]
