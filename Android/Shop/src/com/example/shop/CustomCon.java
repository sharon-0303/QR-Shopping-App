package com.example.shop;


import android.os.Bundle;
import android.app.Activity;
import android.content.Context;
import android.graphics.Color;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

public class CustomCon extends BaseAdapter {

	private Context Context;
	String[] c;
	String[] e;
	String[] d;
	

	public CustomCon (Context applicationContext, String[] c, String[] e,String[] d) {

		this.Context=applicationContext;
		this.c=c;
		this.e=e;
		this.d=d;

		
	}

	@Override
	public int getCount() {
		
		return d.length;
	}

	@Override
	public Object getItem(int arg0) {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public long getItemId(int arg0) {
		// TODO Auto-generated method stub
		return 0;
	}

	@Override
	public View getView(int position, View convertview, ViewGroup parent) {

		
		LayoutInflater inflator=(LayoutInflater)Context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
		
		View gridView;
		if(convertview==null)
		{
			gridView=new View(Context);
			gridView=inflator.inflate(R.layout.custom_con, null);
			
		}
		else
		{
			gridView=(View)convertview;
			
		}
		
		TextView tv1=(TextView)gridView.findViewById(R.id.textView1);
		TextView tv2=(TextView)gridView.findViewById(R.id.textView2);
		TextView tv3=(TextView)gridView.findViewById(R.id.textView3);
		
		
		tv1.setTextColor(Color.BLACK);
		tv2.setTextColor(Color.BLACK);
		tv3.setTextColor(Color.BLACK);
		
		tv1.setText(c[position]);
		tv2.setText(e[position]);

		tv3.setText(d[position]);
		
		
		return gridView;
	}


}
